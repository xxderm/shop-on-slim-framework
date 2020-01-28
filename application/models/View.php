<?
class View
{
    public function render($fname)
    {
        include (dirname(__DIR__)."/views" . '/' . $fname);
    }
}
?>