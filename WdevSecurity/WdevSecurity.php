<?php
//namespace WdevSecurity;
include_once("WdevSecurityConfig.php");
class WdevSecurity
{

    private $cle;
    private $iv = "#D!54962479KSJHDG62158KLDGjYhHoOPn?/:;,nEzSrtUYhGf4589{#@_622496@|([465536286265+/hoiyjj|&&MlJgb?iYn";
    /** Instance de WdevSecurity */
  	private static $_instance = null;
    public function __construct($cle)
    {
      $this->cle = $cle;
    }

    public static function getInstance()
    {
      $cle = WdevSecurityKey;
      for ($i=0; $i < WdevSecurityNbrHash; $i++)
      {
        $cle = WdevSecurity::hashMode($cle, WdevSecurityHashMode);
      }
      if(is_null(self::$_instance))
        self::$_instance = new WdevSecurity($cle);
      return self::$_instance;
    }

    public static function hashMode($k, $mode)
    {

      switch ($mode)
      {
        case 1 :
        {
          $res = hash('sha256', $k);
          $res = hash('sha1', $res);
          $res = hash('tiger192,4', $res);
          $res = hash('ripemd128', $res);
          $res = hash('md5', $res);
          $res = hash('sha384', $res);
          $res = hash('sha1', $res);
          break;
        }

        case 2 :
        {
          $res = hash('ripemd160', $k);
          $res = hash('snefru256', $res);
          $res = hash('sha384', $res);
          $res = hash('sha384', $res);
          $res = hash('sha1', $res);
          $res = hash('sha1', $res);
          $res = hash('sha1', $res);
          break;
        }

        case 3 :
        {
          $res = hash('sha1', $k);
          $res = hash('crc32', $res);
          $res = hash('sha224', $res);
          $res = hash('sha1', $res);
          $res = hash('haval192,5', $res);
          $res = hash('sha1', $res);
          $res = hash('tiger192,4', $res);
          break;
        }


        case 4 :
        {
          $res = hash('md5', $k);
          $res = hash('tiger192,4', $res);
          $res = hash('sha1', $res);
          $res = hash('tiger192,3', $res);
          $res = hash('sha384', $res);
          $res = hash('sha1', $res);
          $res = hash('ripemd320', $res);
          break;
        }

        case 5 :
        {
          $res = hash('fnv132', $k);
          $res = hash('sha1', $res);
          $res = hash('haval128,4', $res);
          $res = hash('sha1', $res);
          $res = hash('crc32', $res);
          $res = hash('sha224', $res);
          $res = hash('crc32b', $res);
          break;
        }

        case 6 :
        {
          $res = hash('crc32b', $k);
          $res = hash('sha1', $res);
          $res = hash('sha1', $res);
          $res = hash('tiger128,3', $res);
          $res = hash('tiger192,4', $res);
          $res = hash('md5', $res);
          $res = hash('ripemd320', $res);
          break;
        }

        case 7 :
        {
          $res = hash('tiger192,3', $k);
          $res = hash('md5', $res);
          $res = hash('fnv164', $res);
          $res = hash('ripemd320', $res);
          $res = hash('fnv132', $res);
          $res = hash('sha1', $res);
          $res = hash('tiger128,3', $res);
          break;
        }

        case 8 :
        {
          $res = hash('sha1', $k);
          $res = hash('fnv132', $res);
          $res = hash('sha1', $res);
          $res = hash('tiger192,3', $res);
          $res = hash('md5', $res);
          $res = hash('fnv164', $res);
          $res = hash('sha1', $res);
          break;
        }

        case 9 :
        {
          $res = hash('ripemd320', $k);
          $res = hash('haval128,3', $res);
          $res = hash('sha1', $res);
          $res = hash('sha1', $res);
          $res = hash('fnv164', $res);
          $res = hash('fnv132', $res);
          $res = hash('sha1', $res);
          break;
        }


        case 10 :
        {
          $res = hash('sha1', $k);
          $res = hash('tiger128,3', $res);
          $res = hash('sha1', $res);
          $res = hash('md5', $res);
          $res = hash('sha1', $res);
          $res = hash('fnv164', $res);
          $res = hash('ripemd320', $res);
          break;
        }


        default:
        {
          $res = hash('haval160,3', $k);
          $res = hash('sha1', $res);
          $res = hash('md5', $res);
          $res = hash('sha1', $res);
          $res = hash('sha1', $res);
          $res = hash('sha1', $res);
          $res = hash('tiger128,3', $res);
          break;
        }
      }

      return $res;
    }

    public function testWdevS($data_a_crypter,$c1,$c2=null,$c3=null,$c4=null,
    $c5=null,$c6=null,$c7=null,$c8=null,$c9=null,$c10=null,$c11=null,
    $c12=null,$c13=null,$c14=null,$c15=null,$c16=null,$c17=null)
    {
      if(isset($c17))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11,
                                    $c12,$c13,$c14,$c15,$c16,$c17);
        $decrypt = $this->decrypt($crypt,$c17,$c16,$c15,$c14,$c13,$c12,$c11,$c10,$c9,
                                        $c8,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c16))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11,
                                    $c12,$c13,$c14,$c15,$c16);
        $decrypt = $this->decrypt($crypt,$c16,$c15,$c14,$c13,$c12,$c11,$c10,$c9,
                                        $c8,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c15))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11,
                                    $c12,$c13,$c14,$c15);
        $decrypt = $this->decrypt($crypt,$c15,$c14,$c13,$c12,$c11,$c10,$c9,
                                        $c8,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c14))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11,
                                    $c12,$c13,$c14);
        $decrypt = $this->decrypt($crypt,$c14,$c13,$c12,$c11,$c10,$c9,
                                        $c8,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }


      if(isset($c13))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11,
                                    $c12,$c13);
        $decrypt = $this->decrypt($crypt,$c13,$c12,$c11,$c10,$c9,
                                        $c8,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }


      if(isset($c12))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11,
                                    $c12);
        $decrypt = $this->decrypt($crypt,$c12,$c11,$c10,$c9,
                                        $c8,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }


      if(isset($c11))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11);
        $decrypt = $this->decrypt($crypt,$c11,$c10,$c9,$c8,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c10))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10);
        $decrypt = $this->decrypt($crypt,$c10,$c9,$c8,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c9))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9);
        $decrypt = $this->decrypt($crypt,$c9,$c8,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c8))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8);
        $decrypt = $this->decrypt($crypt,$c8,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c7))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6,$c7);
        $decrypt = $this->decrypt($crypt,$c7,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c6))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5,$c6);
        $decrypt = $this->decrypt($crypt,$c6,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c5))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4,$c5);
        $decrypt = $this->decrypt($crypt,$c5,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c4))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3,$c4);
        $decrypt = $this->decrypt($crypt,$c4,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c3))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2,$c3);
        $decrypt = $this->decrypt($crypt,$c3,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }

      if(isset($c2))
      {
        $crypt = $this->encrypt($data_a_crypter,$c1,$c2);
        $decrypt = $this->decrypt($crypt,$c2,$c1);

        if($decrypt !== $data_a_crypter)
          return false;
        return true;
      }


      $crypt = $this->encrypt($data_a_crypter,$c1);
      $decrypt = $this->decrypt($crypt,$c1);
      if($decrypt !== $data_a_crypter)
        return false;
      return true;


    }


    public function encrypt($data_a_crypter,$c1,$c2=null,$c3=null,$c4=null,
    $c5=null,$c6=null,$c7=null,$c8=null,$c9=null,$c10=null,$c11=null,
    $c12=null,$c13=null,$c14=null,$c15=null,$c16=null,$c17=null)
    {
      $crypt = $this->encr($data_a_crypter,$c1);

      if(isset($c2))
      {
        $crypt = $this->encr($crypt,$c2);

        if (isset($c3))
        {
          $crypt = $this->encr($crypt,$c3);
          if (isset($c4))
          {
            $crypt = $this->encr($crypt,$c4);
            if (isset($c5))
            {
              $crypt = $this->encr($crypt,$c5);
              if (isset($c6))
              {
                $crypt = $this->encr($crypt,$c6);
                if (isset($c7))
                {
                  $crypt = $this->encr($crypt,$c7);
                  if (isset($c8))
                  {
                    $crypt = $this->encr($crypt,$c8);
                    if (isset($c9))
                    {
                      $crypt = $this->encr($crypt,$c9);
                      if (isset($c10))
                      {
                        $crypt = $this->encr($crypt,$c10);

                        if (isset($c11))
                          {
                          $crypt = $this->encr($crypt,$c11);

                            if (isset($c12))
                            {
                              $crypt = $this->encr($crypt,$c12);
                              if (isset($c13))
                              {
                                $crypt = $this->encr($crypt,$c13);
                                if (isset($c14))
                                {
                                  $crypt = $this->encr($crypt,$c14);
                                  if (isset($c15))
                                  {
                                    $crypt = $this->encr($crypt,$c15);
                                    if (isset($c16))
                                    {
                                      $crypt = $this->encr($crypt,$c16);
                                    }
                                    if (isset($c17))
                                    {
                                      $crypt = $this->encr($crypt,$c17);
                                    }
                                  }
                                }
                              }
                            }
                          }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }

      $cr = $crypt;
      //return $cr;
      return base64_encode($cr);

    }


    public function encr($d, $c)
    {
      switch ($c)
      {
        case 'a':
        {
          $algo = "gost";
          $mode = "cbc";
          break;
        }
        case 'b':
        {
          $algo = "gost";
          $mode = "ctr";
          break;
        }

        case 'c':
        {
          $algo = "gost";
          $mode = "ecb";
          break;
        }
        case 'd':
        {
          $algo = "gost";
          $mode = "cfb";
          break;
        }
        case 'e':
        {
          $algo = "cast-128";
          $mode = "ncfb";
          break;
        }
        case 'f':
        {
          $algo = "rijndael-128";
          $mode = "cbc";
          break;
        }
        case 'g':
        {
          $algo = "cast-128";
          $mode = "nofb";
          break;
        }
        case 'h':
        {
          $algo = "gost";
          $mode = "ncfb";
          break;
        }
        case 'i':
        {
          $algo = "twofish";
          $mode = "cbc";
          break;
        }
        case 'j':
        {
          $algo = "cast-256";
          $mode = "cbc";
          break;
        }
        case 'k':
        {
          $algo = "rijndael-128";
          $mode = "cfb";
          break;
        }
        case 'l':
        {
          $algo = "rijndael-128";
          $mode = "ecb";
          break;
        }
        case 'm':
        {
          $algo = "gost";
          $mode = "ofb";
          break;
        }
        case 'n':
        {
          $algo = "loki97";
          $mode = "cbc";
          break;
        }
        case 'o':
        {
          $algo = "twofish";
          $mode = "cfb";
          break;
        }
        case 'p':
        {
          $algo = "rijndael-128";
          $mode = "ctr";
          break;
        }
        case 'q':
        {
          $algo = "gost";
          $mode = "nofb";
          break;
        }
        case 'r':
        {
          $algo = "twofish";
          $mode = "ecb";
          break;
        }
        case 's':
        {
          $algo = "cast-128";
          $mode = "ofb";
          break;
        }
        case 't':
        {
          $algo = "twofish";
          $mode = "ctr";
          break;
        }
        case 'u':
        {
          $algo = "cast-256";
          $mode = "ecb";
          break;
        }
        case 'v':
        {
          $algo = "rijndael-128";
          $mode = "ncfb";
          break;
        }
        case 'w':
        {
          $algo = "cast-128";
          $mode = "ecb";
          break;
        }
        case 'x':
        {
          $algo = "loki97";
          $mode = "ctr";
          break;
        }
        case 'y':
        {
          $algo = "loki97";
          $mode = "ecb";
          break;
        }
        case 'z':
        {
          $algo = "cast-256";
          $mode = "cfb";
          break;
        }

        case 'A':
        {
          $algo = "twofish";
          $mode = "ncfb";
          break;
        }
        case 'B':
        {
          $algo = "cast-256";
          $mode = "ncfb";
          break;
        }
        case 'C':
        {
          $algo = "loki97";
          $mode = "ncfb";
          break;
        }
        case 'D':
        {
          $algo = "cast-256";
          $mode = "nofb";
          break;
        }
        case 'E':
        {
          $algo = "saferplus";
          $mode = "cbc";
          break;
        }
        case 'F':
        {
          $algo = "rijndael-128";
          $mode = "ofb";
          break;
        }
        case 'G':
        {
          $algo = "rijndael-192";
          $mode = "cbc";
          break;
        }
        case 'H':
        {
          $algo = "loki97";
          $mode = "cfb";
          break;
        }
        case 'I':
        {
          $algo = "cast-256";
          $mode = "ofb";
          break;
        }
        case 'J':
        {
          $algo = "saferplus";
          $mode = "ctr";
          break;
        }
        case 'K':
        {
          $algo = "saferplus";
          $mode = "ecb";
          break;
        }
        case 'L':
        {
          $algo = "twofish";
          $mode = "ofb";
          break;
        }
        case 'M':
        {
          $algo = "cast-128";
          $mode = "cbc";
          break;
        }
        case 'N':
        {
          $algo = "rijndael-192";
          $mode = "ecb";
          break;
        }
        case 'O':
        {
          $algo = "rijndael-192";
          $mode = "cfb";
          break;
        }
        case 'P':
        {
          $algo = "rijndael-192";
          $mode = "ctr";
          break;
        }
        case 'Q':
        {
          $algo = "rijndael-128";
          $mode = "nofb";
          break;
        }
        case 'R':
        {
          $algo = "loki97";
          $mode = "ofb";
          break;
        }
        case 'S':
        {
          $algo = "twofish";
          $mode = "nofb";
          break;
        }
        case 'T':
        {
          $algo = "saferplus";
          $mode = "nofb";
          break;
        }
        case 'U':
        {
          $algo = "rijndael-192";
          $mode = "ncfb";
          break;
        }
        case 'V':
        {
          $algo = "loki97";
          $mode = "nofb";
          break;
        }
        case 'W':
        {
          $algo = "	rijndael-192";
          $mode = "nofb";
          break;
        }
        case 'X':
        {
          $algo = "xtea";
          $mode = "cbc";
          break;
        }
        case 'Y':
        {
          $algo = "rijndael-192";
          $mode = "ofb";
          break;
        }
        case 'Z':
        {
          $algo = "saferplus";
          $mode = "ncfb";
          break;
        }


        default:
        {
          $algo = "tripledes";
          $mode = "cfb";
          break;
        }
      }

      $key_size = mcrypt_module_get_algo_key_size($algo);
      $iv_size = mcrypt_get_iv_size($algo, $mode);
      $iv = substr($this->iv, 0, $iv_size);
      $k = substr($this->cle, 0, $key_size);
      $crypte = mcrypt_encrypt($algo, $k, $d, $mode, $iv);

      return $crypte;
    }



    public function decrypt($crypte,$c1,$c2=null,$c3=null,$c4=null,
    $c5=null,$c6=null,$c7=null,$c8=null,$c9=null,$c10=null,$c11=null,
    $c12=null,$c13=null,$c14=null,$c15=null,$c16=null,$c17=null)
    {
      //
      $crypte       = base64_decode($crypte);
      $decrypt = $this->decr($crypte,$c1);

      if(isset($c2))
      {
        $decrypt = $this->decr($decrypt,$c2);

        if (isset($c3))
        {
          $decrypt = $this->decr($decrypt,$c3);
          if (isset($c4))
          {
            $decrypt = $this->decr($decrypt,$c4);
            if (isset($c5))
            {
              $decrypt = $this->decr($decrypt,$c5);
              if (isset($c6))
              {
                $decrypt = $this->decr($decrypt,$c6);
                if (isset($c7))
                {
                  $decrypt = $this->decr($decrypt,$c7);
                  if (isset($c8))
                  {
                    $decrypt = $this->decr($decrypt,$c8);
                    if (isset($c9))
                    {
                      $decrypt = $this->decr($decrypt,$c9);
                      if (isset($c10))
                      {
                        $decrypt = $this->decr($decrypt,$c10);
                        if (isset($c11))
                        {
                          $decrypt = $this->decr($decrypt,$c11);
                          if (isset($c12))
                          {
                            $decrypt = $this->decr($decrypt,$c12);
                            if (isset($c13))
                            {
                              $decrypt = $this->decr($decrypt,$c13);
                              if (isset($c14))
                              {
                                $decrypt = $this->decr($decrypt,$c14);
                                if (isset($c15))
                                {
                                  $decrypt = $this->decr($decrypt,$c15);
                                  if (isset($c16))
                                  {
                                    $decrypt = $this->decr($decrypt,$c16);
                                  }
                                  if (isset($c17))
                                  {
                                    $decrypt = $this->decr($decrypt,$c17);
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }

      $dr = $decrypt;

      return $dr;

    }



    private function decr($d, $c)
    {
      switch ($c)
      {
        case 'a':
        {
          $algo = "gost";
          $mode = "cbc";
          break;
        }
        case 'b':
        {
          $algo = "gost";
          $mode = "ctr";
          break;
        }

        case 'c':
        {
          $algo = "gost";
          $mode = "ecb";
          break;
        }
        case 'd':
        {
          $algo = "gost";
          $mode = "cfb";
          break;
        }
        case 'e':
        {
          $algo = "cast-128";
          $mode = "ncfb";
          break;
        }
        case 'f':
        {
          $algo = "rijndael-128";
          $mode = "cbc";
          break;
        }
        case 'g':
        {
          $algo = "cast-128";
          $mode = "nofb";
          break;
        }
        case 'h':
        {
          $algo = "gost";
          $mode = "ncfb";
          break;
        }
        case 'i':
        {
          $algo = "twofish";
          $mode = "cbc";
          break;
        }
        case 'j':
        {
          $algo = "cast-256";
          $mode = "cbc";
          break;
        }
        case 'k':
        {
          $algo = "rijndael-128";
          $mode = "cfb";
          break;
        }
        case 'l':
        {
          $algo = "rijndael-128";
          $mode = "ecb";
          break;
        }
        case 'm':
        {
          $algo = "gost";
          $mode = "ofb";
          break;
        }
        case 'n':
        {
          $algo = "loki97";
          $mode = "cbc";
          break;
        }
        case 'o':
        {
          $algo = "twofish";
          $mode = "cfb";
          break;
        }
        case 'p':
        {
          $algo = "rijndael-128";
          $mode = "ctr";
          break;
        }
        case 'q':
        {
          $algo = "gost";
          $mode = "nofb";
          break;
        }
        case 'r':
        {
          $algo = "twofish";
          $mode = "ecb";
          break;
        }
        case 's':
        {
          $algo = "cast-128";
          $mode = "ofb";
          break;
        }
        case 't':
        {
          $algo = "twofish";
          $mode = "ctr";
          break;
        }
        case 'u':
        {
          $algo = "cast-256";
          $mode = "ecb";
          break;
        }
        case 'v':
        {
          $algo = "rijndael-128";
          $mode = "ncfb";
          break;
        }
        case 'w':
        {
          $algo = "cast-128";
          $mode = "ecb";
          break;
        }
        case 'x':
        {
          $algo = "loki97";
          $mode = "ctr";
          break;
        }
        case 'y':
        {
          $algo = "loki97";
          $mode = "ecb";
          break;
        }
        case 'z':
        {
          $algo = "cast-256";
          $mode = "cfb";
          break;
        }
        case 'A':
        {
          $algo = "twofish";
          $mode = "ncfb";
          break;
        }
        case 'B':
        {
          $algo = "cast-256";
          $mode = "ncfb";
          break;
        }
        case 'C':
        {
          $algo = "loki97";
          $mode = "ncfb";
          break;
        }
        case 'D':
        {
          $algo = "cast-256";
          $mode = "nofb";
          break;
        }
        case 'E':
        {
          $algo = "saferplus";
          $mode = "cbc";
          break;
        }
        case 'F':
        {
          $algo = "rijndael-128";
          $mode = "ofb";
          break;
        }
        case 'G':
        {
          $algo = "rijndael-192";
          $mode = "cbc";
          break;
        }
        case 'H':
        {
          $algo = "loki97";
          $mode = "cfb";
          break;
        }
        case 'I':
        {
          $algo = "cast-256";
          $mode = "ofb";
          break;
        }
        case 'J':
        {
          $algo = "saferplus";
          $mode = "ctr";
          break;
        }
        case 'K':
        {
          $algo = "saferplus";
          $mode = "ecb";
          break;
        }
        case 'L':
        {
          $algo = "twofish";
          $mode = "ofb";
          break;
        }
        case 'M':
        {
          $algo = "cast-128";
          $mode = "cbc";
          break;
        }
        case 'N':
        {
          $algo = "rijndael-192";
          $mode = "ecb";
          break;
        }
        case 'O':
        {
          $algo = "rijndael-192";
          $mode = "cfb";
          break;
        }
        case 'P':
        {
          $algo = "rijndael-192";
          $mode = "ctr";
          break;
        }
        case 'Q':
        {
          $algo = "rijndael-128";
          $mode = "nofb";
          break;
        }
        case 'R':
        {
          $algo = "loki97";
          $mode = "ofb";
          break;
        }
        case 'S':
        {
          $algo = "twofish";
          $mode = "nofb";
          break;
        }
        case 'T':
        {
          $algo = "saferplus";
          $mode = "nofb";
          break;
        }
        case 'U':
        {
          $algo = "rijndael-192";
          $mode = "ncfb";
          break;
        }
        case 'V':
        {
          $algo = "loki97";
          $mode = "nofb";
          break;
        }
        case 'W':
        {
          $algo = "	rijndael-192";
          $mode = "nofb";
          break;
        }
        case 'X':
        {
          $algo = "xtea";
          $mode = "cbc";
          break;
        }
        case 'Y':
        {
          $algo = "rijndael-192";
          $mode = "ofb";
          break;
        }
        case 'Z':
        {
          $algo = "saferplus";
          $mode = "ncfb";
          break;
        }

        default:
        {
          $algo = "tripledes";
          $mode = "cfb";
          break;
        }
      }

      $key_size = mcrypt_module_get_algo_key_size($algo);
      $iv_size = mcrypt_get_iv_size($algo, $mode);
      $iv = substr($this->iv, 0, $iv_size);
      $k = substr($this->cle, 0, $key_size);
      $deCrypte = mcrypt_decrypt($algo, $k, $d, $mode, $iv);


      return trim($deCrypte);
    }


}



 ?>
