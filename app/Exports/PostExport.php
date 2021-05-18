<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::all();
    }
    
    public function map($post): array
    {
        
        return [
            $post -> title,
            $post -> description,
            $post -> created_at
        ];
    } 

    public function headings(): array
    {
        return [
            'Title',
            'Description',
            'Posted Date'
        ];
    }
}
