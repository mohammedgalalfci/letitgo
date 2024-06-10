<?php

namespace App\Traits;

trait Paginator
{
    public function getPaginator($paginator,$count){
        return [
            'number_of_items_per_page' => $paginator->count(),
            'current_page' => $paginator->currentPage(),
            'number_of_pages' => $paginator->lastPage(),
            'next_page' => $paginator->nextPageUrl(),
            'previous_page' => $paginator->previousPageUrl(),
            'count' => $count,
        ];
    }

}
