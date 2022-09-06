<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
<<<<<<< Updated upstream
use Illuminate\Database\Eloquent\Relations\BelongsTo;
=======
>>>>>>> Stashed changes
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MembershipClub extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name','slug','country','club_email','club_mobile','club_website','club_facebook_link','club_instagram_link',
        'club_twitter_link','club_venue','club_zip_code','club_language','number_of_supporters','last_supporter_joined_date',
        'ticket_contact_nam','ticket_contact_email','ticket_contact_number','ticket_address'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($club) {
            $club->slug = $club->generateSlug($club->name);
            $club->save();
        });
    }
    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
<<<<<<< Updated upstream

    /**
     * Get the user that owns the MembershipClub
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get all of the users for the MembershipClub
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members(): HasMany
    {
        return $this->hasMany(User::class,'club_id');
=======
    /**
     * Get all of the comments for the MembershipClub
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
>>>>>>> Stashed changes
    }
}
