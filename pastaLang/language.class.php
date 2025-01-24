<?php
class Language {
    private $lang;
    private $language;

    public function __construct() {
        $this->lang = 'pt-br'; // padrão
        if(isset($_SESSION['lang']) && !empty($_SESSION['lang'])) {
            $this->lang = $_SESSION['lang'];
        }

        $this->language = array();

        $langFile = __DIR__ . "/lang/".$this->lang.".ini"; // Ajuste aqui
        if(file_exists($langFile)) {
            $this->language = parse_ini_file($langFile); // Ajuste aqui
        }
    }

    public function get($word) {
        return $this->language[$word] ?? $word;
    }
}
?>
