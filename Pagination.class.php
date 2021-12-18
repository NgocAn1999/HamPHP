<?php
class Panigation
{
    private $totalItems;
    private $totalItemsPerPage  = 1; // Số phần tử cần (sản phẩm,...)hiển thị trên 1 trang
    private $pageRange          = 5; // Số phần tử hiển thị của số phân trang
    private $totalPage;              // Tổng số trang 
    private $currentPage        = 1; // Lấy số trang hiện tại đang đứng

    public function __construct($totalItems, $totalItemsPerPage, $pageRange, $currentPage)
    {
        $this->totalItems           = $totalItems;
        $this->totalItemsPerPage    = $totalItemsPerPage;
        // Nếu truyền vào là số chẵn sẽ bị lỗi tính toán ra số trang nên ta luôn chuyển về số lẻ
        if ($pageRange % 2 == 0) {
            $pageRange =  $pageRange + 1;
        }
        $this->pageRange            = $pageRange;
        $this->totalPage            = ceil($totalItems / $totalItemsPerPage);
        $this->currentPage          = $currentPage;
    }
    public function showPagination()
    {
        $xHTMLPanigator = null;
        if ($this->totalPage  > 1) {
            $star = '<li class="page-item"><a class="page-link">STAR</a></li>';
            $previous = '<li class="page-item"><a class="page-link">Previous</a></li>';
            if ($this->currentPage  > 1) {
                $star = '<li class="page-item"><a class="page-link" href="?page=1">STAR</a> </li>';
                $previous = '<li class="page-item"><a class="page-link" href="?page=' . ($this->currentPage  - 1) . '">Previous</a></li>';
            }
            $next = '<li class="page-item"><a class="page-link">NEXT</a></li>';
            $END = '<li class="page-item"><a class="page-link">End</a></li>';
            if ($this->currentPage  < $this->totalPage) {
                $next = '<li class="page-item"><a class="page-link" href="?page=' . ($this->currentPage  + 1) . '">Next</a> </li>';
                $END = '<li class="page-item"><a class="page-link" href="?page=' . ($this->totalPage) . '">END</a></li>';
            }
            if ($this->pageRange < $this->totalPage) {
                if ($this->currentPage  == 1) {
                    $starPage = 1;
                    $endPage = $this->pageRange;
                } else if ($this->currentPage  == $this->totalPage) {
                    $starPage = $this->totalPage  - $this->pageRange + 1;
                    $endPage = $this->totalPage;
                } else {
                    $starPage = $this->currentPage  - ($this->pageRange - 1) / 2;
                    $endPage = $this->currentPage  + ($this->pageRange - 1) / 2;

                    if ($starPage < 1) {
                        $starPage = 1;
                        $endPage = $endPage + 1;
                    }
                    if ($endPage > $this->totalPage) {
                        $endPage = $this->totalPage;
                        $starPage = $endPage - $this->pageRange + 1;
                    }
                }
            } else {
                $starPage = 1;
                $endPage = $this->totalPage;
            }
            $numberPage=null;
            for ($i = $starPage; $i <= $endPage; $i++) {
                if ($this->currentPage  == $i) {
                    $numberPage .= '<li class="page-item active"  ><a class="page-link" href="#">' . $i . '</a></li>';
                } else {
                    $numberPage .= '<li class="page-item"  ><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            $xHTMLPanigator = '<ul class="pagination">' . $star . '    ' . $previous . '' . $numberPage . '' . $next . '' . $END . '</ul>';
        }
        return $xHTMLPanigator;
    }
}
