<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**

     *
     * @return bool
     */

    public function allPreviousPadriWorked(): bool
    {

        if ($this->padre === null) {
            return true;
        }


        if ($this->padre === 1) {
            return true;
        }

        $samePadri = self::where('padre', $this->padre)->get();


        foreach ($samePadri as $padre) {
            if (!$padre->lavorata) {
                return false;
            }
        }

        return true;
    }
    public function isLeaf(): bool
    {

        return $this->children()->count() === 0;
    }


    public function children()
    {
        return $this->hasMany(Activity::class, 'padre', 'id');
    }
}


