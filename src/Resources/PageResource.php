<?php

namespace Jecar\Commerce\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'title' => $this->title,
            'path' => $this->path,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'meta_image' => $this->meta_image,
            'published' => $this->published,
            'links' => [
                'view_live' => [
                    'method' => 'GET',
                    'label' => 'View Live',
                    'href' => config('app.url') . $this->path
                ],
                'page_editor' => [
                    'method' => 'GET',
                    'label' => 'Page Editor',
                    'href' => route('pages.show', ['page' => $this->id]),
                ],
                'update' => [
                    'method' => 'PUT',
                    'label' => 'Edit',
                    'href' => route('pages.update', ['page' => $this->id])
                ],
                'delete' => [
                    'method' => 'DELETE',
                    'label' => 'Delete',
                    'href' => route('pages.delete', ['page' => $this->id])
                ],
            ]
        ];
    }
}
