<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Length
     *
     * @param	string
     * @param	string
     * @return	bool
     */
    public function length($str, $val)
    {
        return (strlen($str) == $val);
    }

    // --------------------------------------------------------------------
    /**
     * Password
     *
     * @param	string
     * @return	bool
     */
    public function password($str)
    {
        if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/", $str)!==0)
        {
            return true;
        }else
        {
//            $this->set_message('password', 'The {field} must contain at least one uppercase, number and symbol.');
            return false;
        }
    }

    // --------------------------------------------------------------------

    /**
     * US_Phone
     *
     * @param	string
     * @return	bool
     */
    public function us_phone($str)
    {

       /* if (preg_match("/^\(?(\d{3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})$/", $str)!==0)
        {
            return true;
        }else
        {
            return false;
        }*/
        return (bool) preg_match("/^\(?(\d{3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})$/", $str);
    }

    // --------------------------------------------------------------------
    /**
     *
     * UK Postcode validation expression from Wikipedia
     * http://en.wikipedia.org/wiki/Postcodes_in_the_United_Kingdom
     *
     * Note: Remember to strtoupper() your postcode before inserting into database!
     *
     */
    function uk_postcode($str)
    {

        $pattern = "/^(GIR 0AA)|(((A[BL]|B[ABDHLNRSTX]?|C[ABFHMORTVW]|D[ADEGHLNTY]|E[HNX]?|F[KY]|G[LUY]?|H[ADGPRSUX]|I[GMPV]|JE|K[ATWY]|L[ADELNSU]?|M[EKL]?|N[EGNPRW]?|O[LX]|P[AEHLOR]|R[GHM]|S[AEGKLMNOPRSTY]?|T[ADFNQRSW]|UB|W[ADFNRSV]|YO|ZE)[1-9]?[0-9]|((E|N|NW|SE|SW|W)1|EC[1-4]|WC[12])[A-HJKMNPR-Y]|(SW|W)([2-9]|[1-9][0-9])|EC[1-9][0-9]) [0-9][ABD-HJLNP-UW-Z]{2})$/";


        if (preg_match($pattern, strtoupper($str)))
        {
            return TRUE;
        }
        else
        {
            $this->set_message('uk_postcode', 'Please enter a valid postcode');
            return FALSE;
        }
    }

    // --------------------------------------------------------------------
    /**
     * Valid Date
     *
     * Verify that the date value provided can be converted to a valid unix timestamp
     *
     * @param string  $str
     * @return    bool
     */

    public function valid_date($str) {

        if (($str = strtotime($str)) === FALSE) {
            $this->set_message('valid_date', '{field} must be a valid date.');
            return FALSE;
        }

        return TRUE;
    }

}