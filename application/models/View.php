<?
class View
{
    public static function render($fname)
    {
        include (dirname(__DIR__)."/views" . '/' . $fname);
    }
}
?>