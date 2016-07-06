<?php

namespace App\Http\Controllers;

use App\Banner;
use App\ClickImageEvent;
use App\Comment;
use App\Image;
use App\ImageCategory;
use App\ImageTag;
use App\RateImageEvent;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show_upload_form(){
        return view('image.upload');
    }

    public function upload_images(Request $request){
        //   $upload_info
        $input = $request->all();

        $name = $input['title'];
        $ratings = $views = $total_score = 0;
        $author_id = Auth::user()['id'];
        if (!$request->has('original')) $input['original'] = 'Original';//fixme: this is wrong, fix it after done
        $category_id = ImageCategory::where('name', $input['original'])->first()['id'];
        $description = $input['description'];
        if (isset($input['browsing_restriction']))
            $browsing_restriction = $input['browsing_restriction'];
        else
            $browsing_restriction = 'All ages';
        if (isset($input['privacy']))
            $privacy = $input['privacy'];
        else
            $privacy = 'public';
        $tags = preg_split('/\s+/', trim($input['tags']));


        //fixme: umfinished

        //DO upload works
        $upload_info = '';
        $cnt = 0;
        foreach ($_FILES['uploaded_images']['error'] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['uploaded_images']['tmp_name'][$key];
                date_default_timezone_set("Asia/Shanghai");
                $filename = date('Y-m-d_H-i-s') . '_' . $_FILES['uploaded_images']['name'][$key];
                $filename_for_savepath = date('Y-m-d_H-i-s') . '_' . md5_file($tmp_name);
                $file_entension = '.' . pathinfo($_FILES['uploaded_images']['name'][$key], PATHINFO_EXTENSION);
//            $filename = date('Y-m-d_H-i-s') . '_' . str_random(20);
                $filesize = $_FILES['uploaded_images']['size'][$key];
                $filetype = $_FILES['uploaded_images']['type'][$key];
                //TODO: do some input check

                $upload_dir = 'uploaded_img/';
                $upload_file = $upload_dir . basename($filename_for_savepath) . $file_entension;#with time stamp
                $file_already_exists = Image::where('md5_hash', md5_file($tmp_name))->count() != 0;
                if ($file_already_exists) {
                    $upload_info .= $filename . ' ALREADY EXISTS in server<br>';
                } else if (move_uploaded_file($tmp_name, $upload_file)) {
                    $upload_info .= $filename . ' has been UPLOADED<br>';
                    $cnt++;
                    list($width, $height) = getimagesize($upload_file);
                    // TODO: add this image to db
                    // insert into image
                    $image = new Image;
                    $image->name = $name;
                    $image->filepath = $upload_file;
                    $image->filesize = $filesize;
                    $image->filename = $filename;
                    $image->filetype = $filetype;
                    $image->ratings = $ratings;
                    $image->views = $views;
                    $image->author_id = $author_id;
                    $image->total_score = $total_score;
                    $image->resolution_height = $height;
                    $image->resolution_width = $width;
                    $image->category_id = $category_id;
                    $image->description = $description;
                    $image->browsing_restriction = $browsing_restriction;
                    $image->privacy = $privacy;
                    $image->md5_hash = md5_file($upload_file);
                    $image->save();
                    // add tag to image_tag and tag_category if necessary
                    $image_id = $image->id;
                    foreach ($tags as $tag_name) {
                        // find the id of the name, or create it if not exists
                        if (Tag::where('name', $tag_name)->count() == 0) {
                            $tag = new Tag;
                            $tag->name = $tag_name;
                            $tag->save();
                        }
                        $tag_id = Tag::where('name', $tag_name)->first()['id'];
                        $image_tag = new ImageTag;
                        $image_tag->image_id = $image_id;
                        $image_tag->tag_id = $tag_id;
                        $image_tag->added_user = $author_id;
                        $image_tag->save();
                    }
                } else {
                    $upload_info .= $filename . ' FAILED to upload<br>';
                }
            }
        }
        $upload_info .= '<h1>' . $cnt . ' files uploaded successfully</h1>';
        Session::flash('upload_info', $upload_info);
        return redirect()->route('image.upload');
    }

    public function rate_it(Request $request){
        $input = $request->all();
        $user_id = $input['user_id'];
        $image_id = $input['image_id'];
        $score = $input['score'];
        $rate = new RateImageEvent;
        $rate->user_id = $user_id;
        $rate->image_id = $image_id;
        $rate->score = $score;
        $rate->save();
        $image = Image::find($image_id);
        $image->ratings++;
        $image->total_score += $score;
        $image->save();
    }
    
    public function tag_it(Request $request){

        $input = $request->all();
        $added_user = ($input['added_user']);
        $image_id = ($input['image_id']);
        $tag_name = ($input['tag_name']);
        // if tag not exist, insert it into tag categrty, otherwise fetch it
        $tag = Tag::where('name', $tag_name)->first();
        if ($tag == null) {
            $tag = new Tag;
            $tag->name = $tag_name;
            $tag->save();
        }
        // add tag to db if this image has no this tag
        if (ImageTag::where('image_id', $image_id)->where('tag_id', $tag->id)->count() == 0) {
            $image_tag = new ImageTag;
            $image_tag->image_id = $image_id;
            $image_tag->tag_id = $tag->id;
            $image_tag->added_user = $added_user;
            $image_tag->save();
        } else {
            return 'tag existed';
        }
    }

    public function comment_it(Request $request){
        $input = $request->all();
        $user_id = ($input['user_id']);
        $image_id = ($input['image_id']);
        $content = ($input['content']);
        // add to database
        $comment = new Comment;
        $comment->user_id = $user_id;
        $comment->image_id = $image_id;
        $comment->content = $content;
        $comment->save();

        // add this comment to current page
        $comment_user = User::find($user_id);
        return view('image.display_comment', [
            'comment' => $comment,
            'comment_user' => $comment_user,
            'div_id' => 'area_comments_' . $comment['id']
        ]);
    }

    public function show_image(Request $request){
        $input = $request->all();
        $display_desc = true;
        $click_by_user = true;
        if ($request->has('image_id'))
            $image_id = $_GET['image_id'];
        if (!isset($image_id)) {
            $image_id = 1;
            $click_by_user = false;
        }
        //fetch current user
        $current_user = Auth::user();

        // fetch image info
        $img = Image::find($image_id);

        // record click event and increment the image's views by one
        // fixme: for test, now do not filter the occasion when the same user click this link multiple times
        if ($click_by_user) {
            $click = new ClickImageEvent;
            $click->user_id = $current_user['id'];
            $click->image_id = $image_id;
            $click->save();
            $img->views++;
            $img->save();
        }

        // fetch author info
        $author = $img->author;

        // fetch author's work's tags, and generate the links
        // todo: laravel --> $author_images_tags_links
        $author_images_tags = DB::select("
        SELECT
          tags.name,
          tags.id,
          count(*) AS count
        FROM images, image_tag, tags
        WHERE images.author_id = ? 
              AND images.id = image_tag.image_id 
              AND tags.id = image_tag.tag_id
        GROUP BY tags.name, tags.id", [$author['id']]);
        $author_images_tags_links = [];
        foreach ($author_images_tags as $tag) {
            $font_style = "font-size: ";
            $size = min($tag->count * 10, 200);
            $size = max($size, 50);
            $font_style .= $size;
            $font_style .= "%;";
            if ($size > 100) $font_style .= " font-weight: bold;";
            $author_images_tags_links[] = '<a href="../image/detail.php?image_id=' . $image_id . '&tag=' . $tag->id . '" style="' . $font_style . '">' . $tag->name . '(' . $tag->count . ')' . ' </a>';
        }

        // fetch category
        $image_category = ImageCategory::find($img['category_id'])['name'];

        // fetch comments
        // TODO: get only part of the comment for pagetion
        $comments = $img->comments;
        if ($display_desc)
            $comments = $comments->sortByDesc('id');

        // fetch image's tag
        $image_tags = $img->tags;

        // fixme: should be order by some recommendation algorithm
        $recommended_images = Image::where('id', '!=', $image_id)->orderByRaw('rand()')->take(3)->get();


//TODO: laravel rated(bool), rating(int)
        $_rate = RateImageEvent::where('user_id', $current_user['id'])
            ->where('image_id', $image_id)->first();
        $rated = $_rate != null;
        $rating = 0;
        if ($rated) $rating = $_rate->score;
//TodO: laravel add tag, write comment, rating, click
        return view('image.detail', [
            'display_desc' => $display_desc,
            'click_by_user' => $click_by_user,
            'image_id' => $image_id,
            'current_user' => $current_user,
            'img' => $img,
            'author' => $author,
            'author_images_tags_links' => $author_images_tags_links,
            'image_category' => $image_category,
            'comments' => $comments,
            'image_tags' => $image_tags,
            'recommended_images' => $recommended_images,
            'rated' => $rated,
            'rating' => $rating,
        ]);
    }
}
