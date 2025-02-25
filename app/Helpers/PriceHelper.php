<?php

namespace App\Helpers;

class PriceHelper
{
    public static function PriceToText($money = '0.00') {
        if (is_int($money)) {
            $money = $money . '.00';
        }

        $money = explode('.', $money);
        if (count($money) != 2) return false;
        $money_left = $money[0];
        $money_right = $money[1];

        $l9 = $l8 = $l7 = $l6 = $l5 = $l4 = $l3 = $l2 = $l1 = '';
        $r2 = $r1 = '';

        if (strlen($money_left) == 9) {
            $i = (int) floor($money_left / 100000000);
            $l9 = self::getHundreds($i);
            $money_left = substr($money_left, 1);
        }

        if (strlen($money_left) == 8) {
            $i = (int) floor($money_left / 10000000);
            $l8 = self::getTens($i); 
            $money_left = substr($money_left, 1);
        }

        if (strlen($money_left) == 7) {
            $i = (int) floor($money_left / 1000000);
            $l7 = self::getMillions($i);
            $money_left = substr($money_left, 1);
        }

        if (strlen($money_left) == 6) {
            $i = (int) floor($money_left / 100000);
            $l6 = self::getHundreds($i);
            $money_left = substr($money_left, 1);
        }

        if (strlen($money_left) == 5) {
            $i = (int) floor($money_left / 10000);
            $l5 = self::getTens($i);
            $money_left = substr($money_left, 1);
        }

        if (strlen($money_left) == 4) {
            $i = (int) floor($money_left / 1000);
            $l4 = self::getThousands($i);
            $money_left = substr($money_left, 1);
        }

        if (strlen($money_left) == 3) {
            $i = (int) floor($money_left / 100);
            $l3 = self::getHundreds($i);
            $money_left = substr($money_left, 1);
        }

        if (strlen($money_left) == 2) {
            $i = (int) floor($money_left / 10);
            $l2 = self::getTens($i);
            $money_left = substr($money_left, 1);
        }

        if (strlen($money_left) == 1) {
            $i = (int) floor($money_left / 1);
            $l1 = self::getOnes($i);
            $money_left = substr($money_left, 1);
        }

        if (strlen($money_right) == 2) {
            $i = (int) floor($money_right / 10);
            $r2 = self::getTens($i);
            $money_right = substr($money_right, 1);
        }

        if (strlen($money_right) == 1) {
            $i = (int) floor($money_right / 1);
            $r1 = self::getOnes($i);
            $money_right = substr($money_right, 1);
        }

        

        return trim("$l9 $l8 $l7 $l6 $l5 $l4 $l3 $l2 $l1 TÜRK LİRASI" . ($r2 || $r1 ? " $r2 $r1 KURUŞ" : ""));
 
    }

    private static function getHundreds($i)
    {
        $hundreds = [
            1 => 'YÜZ', 2 => 'İKİ YÜZ', 3 => 'ÜÇ YÜZ', 4 => 'DÖRT YÜZ',
            5 => 'BEŞ YÜZ', 6 => 'ALTI YÜZ', 7 => 'YEDİ YÜZ', 8 => 'SEKİZ YÜZ',
            9 => 'DOKUZ YÜZ', 0 => ''
        ];
        return $hundreds[$i];
    }

    private static function getTens($i)
    {
        $tens = [
            1 => 'ON', 2 => 'YİRMİ', 3 => 'OTUZ', 4 => 'KIRK', 5 => 'ELLİ',
            6 => 'ATMIŞ', 7 => 'YETMİŞ', 8 => 'SEKSEN', 9 => 'DOKSAN', 0 => ''
        ];
        return $tens[$i];
    }

    private static function getMillions($i)
    {
        $millions = [
            1 => 'BİR MİLYON', 2 => 'İKİ MİLYON', 3 => 'ÜÇ MİLYON', 4 => 'DÖRT MİLYON',
            5 => 'BEŞ MİLYON', 6 => 'ALTI MİLYON', 7 => 'YEDİ MİLYON', 8 => 'SEKİZ MİLYON',
            9 => 'DOKUZ MİLYON', 0 => ''
        ];
        return $millions[$i];
    }

    private static function getThousands($i)
    {
        $thousands = [
            1 => 'BİR BİN', 2 => 'İKİ BİN', 3 => 'ÜÇ BİN', 4 => 'DÖRT BİN',
            5 => 'BEŞ BİN', 6 => 'ALTI BİN', 7 => 'YEDİ BİN', 8 => 'SEKİZ BİN',
            9 => 'DOKUZ BİN', 0 => ''
        ];
        return $thousands[$i];
    }

    private static function getOnes($i)
    {
        $ones = [
            1 => 'BİR', 2 => 'İKİ', 3 => 'ÜÇ', 4 => 'DÖRT', 5 => 'BEŞ',
            6 => 'ALTI', 7 => 'YEDİ', 8 => 'SEKİZ', 9 => 'DOKUZ', 0 => ''
        ];
        return $ones[$i];
    }
}