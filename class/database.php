<?
class veritabani{

  public $vtAdi;
	public $vtServer;
	public $vtKullanici;
	public $vtSifre;
	public $vt;

	public function connect(){
       
        $this->vt=@mysql_connect($this->vtServer, $this->vtKullanici, $this->vtSifre);

        @mysql_select_db($this->vtAdi, $this->vt);
        @mysql_query("SET NAMES 'utf-8'");
	}

   public function baglantiyiKes(){
 
       @mysql_close();

   }

}

?>