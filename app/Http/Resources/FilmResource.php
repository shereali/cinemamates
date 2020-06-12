<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Genre;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'slug'        => $this->slug,
            'description' => $this->description,
            'release'     => $this->release,
            'date'        => $this->date,
            'year'        => Carbon::parse($this->date)->format('Y'),
            'rating'      => $this->rating,
            'ticket'      => $this->ticket,
            'price'       => $this->price,
            'country_id'  => $this->country_id,
            'genre_id'    => $this->genre_id,
            'photo'       => $this->photo,
            'country'     => $this->country,
            'comments'     => $this->comments,
            'genres'       => Genre::whereIn('id', json_decode($this->genre_id, true))->get()
        ];
    }
}
