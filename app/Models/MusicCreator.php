<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicCreator extends Model
{
    protected $fillable = [
        'name',
        'birthday',
        'district',
        'local',
        'music_background',
    ];

    // Define relationships
    public function lyricistMusics()
    {
        return $this->belongsToMany(Music::class, 'music_lyricist', 'lyricist_id', 'music_id');
    }

    public function composerMusics()
    {
        return $this->belongsToMany(Music::class, 'music_composer', 'composer_id', 'music_id');
    }

    public function arrangerMusics()
    {
        return $this->belongsToMany(Music::class, 'music_arranger', 'arranger_id', 'music_id');
    }
}
