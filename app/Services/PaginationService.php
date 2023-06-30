<?php

namespace App\Services;

class PaginationService
{
    public function buildPaginationProps($paginator)
    {
        $next_page_url = $paginator->nextPageUrl();
        $prev_page_url = $paginator->previousPageUrl();
        $current_page = $paginator->currentPage();
        $last_page = $paginator->lastPage();
        $total = $paginator->total();
        $per_page = $paginator->perPage();
        $multiple_pages = $paginator->lastPage() > 1;

        $page_urls = [];
        for ($i = 1; $i <= $last_page; $i++) {
            $page_urls[] = $paginator->url($i);
        }
        return compact(
            "next_page_url",
            "prev_page_url",
            "current_page",
            "last_page",
            "total",
            "per_page",
            "multiple_pages",
            "page_urls"
        );
    }
}
