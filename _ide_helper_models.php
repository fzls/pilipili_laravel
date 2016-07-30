<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Pilipili{
/**
 * Pilipili\Ad
 *
 * @property integer $id
 * @property string $link
 * @property string $post_path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Ad whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Ad whereLink($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Ad wherePostPath($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Ad whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Ad whereUpdatedAt($value)
 */
	class Ad extends \Eloquent {}
}

namespace Pilipili{
/**
 * Pilipili\Banner
 *
 * @property integer $id
 * @property string $link
 * @property string $post_path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Banner whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Banner whereLink($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Banner wherePostPath($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Banner whereUpdatedAt($value)
 */
	class Banner extends \Eloquent {}
}

namespace Pilipili{
/**
 * Pilipili\ClickImageEvent
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $image_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ClickImageEvent whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ClickImageEvent whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ClickImageEvent whereImageId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ClickImageEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ClickImageEvent whereUpdatedAt($value)
 */
	class ClickImageEvent extends \Eloquent {}
}

namespace Pilipili{
/**
 * Pilipili\Comment
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
 * @property-read \Pilipili\User $user
 * @property-read \Pilipili\Image $image
 * @property-read \Pilipili\Comment $reply_to
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Comment whereImageId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Comment whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Comment whereReplyToCommentId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Comment whereVoteUp($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Comment whereVoteDown($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Comment whereVoteCount($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Comment whereUpdatedAt($value)
 */
	class Comment extends \Eloquent {}
}

namespace Pilipili{
/**
 * Pilipili\Follow
 *
 * @property integer $id
 * @property integer $follower_id
 * @property integer $followee_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Follow whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Follow whereFollowerId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Follow whereFolloweeId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Follow whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Follow whereUpdatedAt($value)
 */
	class Follow extends \Eloquent {}
}

namespace Pilipili{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\User[] $visited_users
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\User[] $rated_users
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\ClickImageEvent[] $visits
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\RateImageEvent[] $rates
 * @property-read \Pilipili\User $author
 * @property-read \Pilipili\ImageCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\Tag[] $tags
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereFilepath($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereFilesize($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereFiletype($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereRatings($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereViews($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereTotalScore($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereResolutionHeight($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereResolutionWidth($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereBrowsingRestriction($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image wherePrivacy($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereMd5Hash($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Image whereUpdatedAt($value)
 */
	class Image extends \Eloquent {}
}

namespace Pilipili{
/**
 * Pilipili\ImageCategory
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\Image[] $images
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ImageCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ImageCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ImageCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ImageCategory whereUpdatedAt($value)
 */
	class ImageCategory extends \Eloquent {}
}

namespace Pilipili{
/**
 * Pilipili\ImageTag
 *
 * @property integer $id
 * @property integer $image_id
 * @property integer $tag_id
 * @property integer $added_user
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ImageTag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ImageTag whereImageId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ImageTag whereTagId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ImageTag whereAddedUser($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ImageTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\ImageTag whereUpdatedAt($value)
 */
	class ImageTag extends \Eloquent {}
}

namespace Pilipili{
/**
 * Pilipili\RateImageEvent
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $image_id
 * @property integer $score
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\RateImageEvent whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\RateImageEvent whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\RateImageEvent whereImageId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\RateImageEvent whereScore($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\RateImageEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\RateImageEvent whereUpdatedAt($value)
 */
	class RateImageEvent extends \Eloquent {}
}

namespace Pilipili{
/**
 * Pilipili\Tag
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\Image[] $images
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Tag whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace Pilipili{
/**
 * Pilipili\User
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\Image[] $visited_images
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\Image[] $rated_images
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\ClickImageEvent[] $visits
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\RateImageEvent[] $rates
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\Image[] $works
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\User[] $followings
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\User[] $followers
 * @property-read \Illuminate\Database\Eloquent\Collection|\Pilipili\Tag[] $tags
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User wherePilipiliId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereNickname($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereGenderVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereBirth($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereBirthVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereOccupation($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereOccupationVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereCountryVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereCityVisibility($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereLevel($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereIsPremiumMember($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User wherePremiumMemberEndTime($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereSelfDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereAvatarFilepath($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereCustomBackgroundImageFilepath($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User wherePreferedLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace Pilipili{
/**
 * Pilipili\UserTag
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $tag_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\UserTag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\UserTag whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\UserTag whereTagId($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\UserTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Pilipili\UserTag whereUpdatedAt($value)
 */
	class UserTag extends \Eloquent {}
}

