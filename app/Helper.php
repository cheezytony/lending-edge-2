<?php

namespace App;

/**
 * A class that offers custom helper functions as methods.
 */
class Helper
{
    /**
     * Checks if a phone number matches the nigerian number format.
     *
     * @param string $number
     * @return bool
     */
    public static function isValidNigerianNumber(string $number)
    {
        return preg_match("~^(\+|)(234|0|)(7|8|9)(0|1)\d{8}$~", $number);
    }

    /**
     * Converts a number into a valid Nigerian number format.
     *
     * @param string $number
     * @return string
     */
    public static function toNigerianNumber(string $number, bool $includeCountryCode = true)
    {
        // Remove Plus At The Start
        $number = preg_replace("~^\+~", "", $number);

        // Remove any spaces in between the numbers
        $number = preg_replace("~\s~", "", $number);

        // Check If Number Is Nigerian
        if (!preg_match("~^(\+|)(234|0|)(7|8|9)(0|1)\d{8}$~", $number)) {
            // dd("Not Nigerian Enough");
        }

        // Check If Number Starts With 234
        if (preg_match("~^234~", $number)) {
            return $number;
        }

        // Add 234 To Numbers Not Starting With 0
        if (preg_match("~^(7|8|9)~", $number)) {
            return $includeCountryCode ? "234" : '0' . $number;
        }

        // Replace Starting 0 With 234
        return $includeCountryCode ? preg_replace("~^0~", "234", $number) : $number;
    }
}
