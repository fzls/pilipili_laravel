<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Ad
 *
 * @property integer $id
 * @property string $link
 * @property string $post_path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Ad whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ad whereLink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ad wherePostPath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ad whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ad whereUpdatedAt($value)
 */
	class Ad extends \Eloquent {}
}

namespace App{
/**
 * App\Banner
 *
 * @property integer $id
 * @property string $link
 * @property string $post_path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereLink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner wherePostPath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereUpdatedAt($value)
 */
	class Banner extends \Eloquent {}
}

namespace App{
/**
 * App\ClickImageEvent
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $image_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ClickImageEvent whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClickImageEvent whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClickImageEvent whereImageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClickImageEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ClickImageEvent whereUpdatedAt($value)
 */
	class ClickImageEvent extends \Eloquent {}
}

namespace App{
/**
 * App\Comment
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $image_id
 * @property string $content
 * @property integer $reply_to_comment_id
 * @property integer $vote_up
 * @property integer $vote_down
 * @property integer $vote_count
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $user
 * @property-read \App\Image $image
 * @property-read \App\Comment $reply_to
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereImageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereReplyToCommentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereVoteUp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereVoteDown($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereVoteCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUpdatedAt($value)
 */
	class Comment extends \Eloquent {}
}

namespace App{
/**
 * App\Follow
 *
 * @property integer $id
 * @property integer $follower_id
 * @property integer $followee_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Follow whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Follow whereFollowerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Follow whereFolloweeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Follow whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Follow whereUpdatedAt($value)
 */
	class Follow extends \Eloquent {}
}

namespace App{
/**
 * Class Image
 *
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $filepath
 * @property float $filesize
 * @property string $filename
 * @property string $filetype
 * @property integer $ratings
 * @property integer $views
 * @property integer $author_id
 * @property integer $total_score
 * @property integer $resolution_height
 * @property integer $resolution_width
 * @property integer $category_id
 * @property string $description
 * @property string $browsing_restriction
 * @property string $privacy
 * @property string $md5_hash
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $visited_users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $rated_users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ClickImageEvent[] $visits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RateImageEvent[] $rates
 * @property-read \App\User $author
 * @property-read \App\ImageCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereFilepath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereFilesize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereFiletype($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereRatings($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereViews($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereTotalScore($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereResolutionHeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereResolutionWidth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereBrowsingRestriction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image wherePrivacy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereMd5Hash($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Image whereUpdatedAt($value)
 */
	class Image extends \Eloquent {}
}

namespace App{
/**
 * App\ImageCategory
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @method static \Illuminate\Database\Query\Builder|\App\ImageCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ImageCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ImageCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ImageCategory whereUpdatedAt($value)
 */
	class ImageCategory extends \Eloquent {}
}

namespace App{
/**
 * App\ImageTag
 *
 * @property integer $id
 * @property integer $image_id
 * @property integer $tag_id
 * @property integer $added_user
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ImageTag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ImageTag whereImageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ImageTag whereTagId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ImageTag whereAddedUser($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ImageTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ImageTag whereUpdatedAt($value)
 */
	class ImageTag extends \Eloquent {}
}

namespace App{
/**
 * App\RateImageEvent
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $image_id
 * @property integer $score
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\RateImageEvent whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RateImageEvent whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RateImageEvent whereImageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RateImageEvent whereScore($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RateImageEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\RateImageEvent whereUpdatedAt($value)
 */
	class RateImageEvent extends \Eloquent {}
}

namespace App{
/**
 * App\Tag
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property integer $id
 * @property string $pilipili_id
 * @property string $email
 * @property string $password
 * @property string $nickname
 * @property string $gender
 * @property boolean $gender_visibility
 * @property string $birth
 * @property boolean $birth_visibility
 * @property string $occupation
 * @property boolean $occupation_visibility
 * @property string $country
 * @property boolean $country_visibility
 * @property string $city
 * @property boolean $city_visibility
 * @property integer $level
 * @property string $role
 * @property boolean $is_premium_member
 * @property string $premium_member_end_time
 * @property string $self_description
 * @property string $avatar_filepath
 * @property string $custom_background_image_filepath
 * @property string $prefered_language
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $visited_images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $rated_images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ClickImageEvent[] $visits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RateImageEvent[] $rates
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $works
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $followings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $followers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePilipiliId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereNickname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereGenderVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereBirth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereBirthVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereOccupation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereOccupationVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCountryVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCityVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLevel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereIsPremiumMember($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePremiumMemberEndTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSelfDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAvatarFilepath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCustomBackgroundImageFilepath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePreferedLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\UserTag
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $tag_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\UserTag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserTag whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserTag whereTagId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserTag whereUpdatedAt($value)
 */
	class UserTag extends \Eloquent {}
}

