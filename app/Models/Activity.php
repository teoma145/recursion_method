<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     *
     *
     * @return bool
     */
    public function allPreviousPadriWorked(): bool
    {
        if ($this->padre === null) {
            return true;
        }

        $previousPadri = self::where('id', '<', $this->padre)->get();

        foreach ($previousPadri as $padre) {
            if (!$padre->lavorata || !$padre->allPreviousPadriWorked()) {
                return false;
            }
        }

        return true;
    }

    /**
     *
     */
    public function setOtherLeafActivities()
    {
        if ($this->isLeaf() && $this->lavorata) {
            $otherLeafActivities = self::where('padre', $this->padre)
                ->where('id', '!=', $this->id)
                ->where('lavorata', false)
                ->get();

            foreach ($otherLeafActivities as $activity) {
                $activity->lavorata = false;
                $activity->save();
            }
        }
    }

    /**
     *
     *
     * @return bool
     */
    public function isLeaf(): bool
    {
        return $this->children()->count() === 0;
    }

    /**
     *
     */
    public function children()
    {
        return $this->hasMany(Activity::class, 'padre', 'id');
    }


}
