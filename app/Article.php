<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    public $timestamps = true;

    /**
     * Convert our timestamps to Carbon instances
     */
    protected $dates = ['published_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'content'];

    /**
     * The rules associated for the fields in this model
     */
    public static $rules = [
        'title' => 'required|max:255',
        'content' => 'required'
    ];

    /**
     * Ensure capitalisation of the title
    */
    protected function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
        $this->attributes['published_at'] = Carbon::now();

        if( !$this->slug)
        {
            $this->attributes['slug'] = Str::slug($value);
        }
    }
}
