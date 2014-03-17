<?php

namespace Sepa\IBAN;

/**
 * Validate IBANs
 *
 * @author Thorsten Schmidt
 * @date 14.03.2014
 * @version 1.0
 * @since 1.0
 */
class Validation
{
    /**
     * Factory method
     *
     * @return object Sepa\IBAN\Validation
     *
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 17.03.14
     */
    public static function factory()
    {
        return new static();
    }

    /**
     * Validate IBAN
     *
     * @param string    IBAN
     *
     * @return mixed    true on success, throws exception on fail
     * @access  public
     * @throws InvalidIBANException
     *
     * @author Thorsten Schmidt
     * @date 14.03.2014
     * @version 1.0
     * @since 1.0
     */
    public function valid($iban)
    {
        if ($this->validate($iban))
        {
            return true;
        }

        throw new Invalid\Exception;
    }

    /**
     * Validate IBAN
     *
     * @param string    IBAN
     *
     * @return boolean  true/false
     * @access  public
     *
     * @author Thorsten Schmidt
     * @date 14.03.2014
     * @version 1.0
     * @since 1.0
     */
    public function is_valid($iban)
    {
        if ($this->validate($iban))
        {
            return true;
        }

        return false;
    }

    /*
     * Numeric values for corresponding letters in IBAN
     */
    protected $convert = array(
        'A' => 10,
        'B' => 11,
        'C' => 12,
        'D' => 13,
        'E' => 14,
        'F' => 15,
        'G' => 16,
        'H' => 17,
        'I' => 18,
        'J' => 19,
        'K' => 20,
        'L' => 21,
        'M' => 22,
        'N' => 23,
        'O' => 24,
        'P' => 25,
        'Q' => 26,
        'R' => 27,
        'S' => 28,
        'T' => 29,
        'U' => 30,
        'V' => 31,
        'W' => 32,
        'X' => 33,
        'Y' => 34,
        'Z' => 35,
    );

    /*
     * Valid IBAN length by country code
     */
    protected $iban_length_by_country_code = array(
        'AD' => 24,
        'AE' => 23,
        'AL' => 28,
        'AT' => 20,
        'AZ' => 28,
        'BA' => 20,
        'BE' => 16,
        'BG' => 22,
        'BH' => 22,
        'BL' => 27,
        'BR' => 29,
        'CH' => 21,
        'CR' => 21,
        'CY' => 28,
        'CZ' => 24,
        'DE' => 22,
        'DK' => 18,
        'DO' => 28,
        'EE' => 20,
        'ES' => 24,
        'FI' => 18,
        'FO' => 18,
        'FR' => 27,
        'GB' => 22,
        'GE' => 22,
        'GF' => 27,
        'GI' => 23,
        'GL' => 18,
        'GP' => 27,
        'GR' => 27,
        'GT' => 28,
        'HK' => 16,
        'HR' => 21,
        'HU' => 28,
        'IE' => 22,
        'IL' => 23,
        'IS' => 26,
        'IT' => 27,
        'JO' => 30,
        'KW' => 30,
        'KZ' => 20,
        'LB' => 28,
        'LI' => 21,
        'LT' => 20,
        'LU' => 20,
        'LV' => 21,
        'MA' => 24,
        'MC' => 27,
        'MD' => 24,
        'ME' => 22,
        'MF' => 27,
        'MK' => 19,
        'MQ' => 27,
        'MR' => 27,
        'MT' => 31,
        'MU' => 30,
        'NC' => 27,
        'NL' => 18,
        'NO' => 15,
        'PF' => 27,
        'PK' => 24,
        'PL' => 28,
        'PM' => 27,
        'PS' => 29,
        'PT' => 25,
        'QA' => 29,
        'RE' => 27,
        'RO' => 24,
        'RS' => 22,
        'SA' => 24,
        'SE' => 24,
        'SI' => 19,
        'SK' => 24,
        'SM' => 27,
        'TF' => 27,
        'TN' => 24,
        'TR' => 26,
        'VG' => 24,
        'WF' => 27,
        'YT' => 27,
    );

    /**
     * Validate an IBAN
     *
     * @param string    IBAN to check
     *
     * @return boolean true/false
     * @access  public
     *
     * @author Thorsten Schmidt
     * @date 08.03.2011
     * @version 1.0
     * @since 1.0
     */
    protected function validate($iban)
    {
        // Remove whitespaces
        $iban = str_replace(' ', '', $iban);

        if ( ! $this->iban_length_is_valid($iban))
        {
            return false;
        }

        // Convert to numeric
        $iban = $this->_prepare_iban($iban);

        // Divide numeric IBAN by 97
        $division_remainder = $this->_divide_by_97_helper($iban);

        // Remainder has to be exactly "1" to be valid IBAN
        if ( $division_remainder !== 1 )
        {
            return false;
        }

        return true;
    }

    /**
     * Prepare IBAN to be used in calculation
     *
     * @param string    IBAN
     *
     * @return IBAN
     * @access  protected
     *
     * @author Thorsten Schmidt
     * @date 08.03.2011
     * @version 1.0
     * @since 1.0
     */
    protected function _prepare_iban($iban)
    {
        // Remove "IBAN" from string, if given
        $iban = str_ireplace('IBAN', '', $iban);

        // Set country code to end of iban
        $country_code = substr($iban, 0, 4);
        $iban = substr($iban, 4) . $country_code;

        // convert letters to digits
        $iban = $this->_convert_to_numeric($iban);

        return $iban;
    }

    /**
     * Check if the thength of the IBAN is valid based on the country code
     *
     * @param string    IBAN
     *
     * @return bool
     * @access  protected
     *
     * @author Thorsten Schmidt
     * @date 08.03.2011
     * @version 1.0
     * @since 1.0
     */
    protected function iban_length_is_valid($iban)
    {
        $country_code = substr($iban, 0, 2);

        // Hide error, if country isn't listed above, it's an invalid IBAN
        if ($length = @$this->iban_length_by_country_code[ $country_code ])
        {
            return (bool) (strlen($iban) == $length);
        }

        return false;
    }

    /**
     * Convert all letters to their numeric values
     *
     * @param string    IBAN
     *
     * @return iban
     * @access  protected
     *
     * @author Thorsten Schmidt
     * @date 08.03.2011
     * @version 1.0
     * @since 1.0
     */
    protected function _convert_to_numeric($iban)
    {
        return str_replace(
            array_keys($this->convert),
            array_values($this->convert),
            $iban
        );
    }

    /**
     * Divide IBAN by 97
     *
     * @param string    Numeric IBAN
     *
     * @return int  remainder of division
     * @access  protected
     *
     * @author Thorsten Schmidt
     * @date 08.03.2011
     * @version 1.0
     * @since 1.0
     */
    protected function _divide_by_97_helper($numeric_iban)
    {
        return (int) bcmod($numeric_iban, 97);
    }
}