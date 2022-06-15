<?php

namespace App\Message;

final class FetchOneUrlMessage
{

        public function __construct(
                private string $alpha2languages,
                private string $alpha2countries,
                private bool $isEnglish = false

        ) {
        }

        /**
         * Get the value of alpha2countries
         */
        public function getAlpha2countries()
        {
                return $this->alpha2countries;
        }

        /**
         * Get the value of alpha2languages
         */
        public function getAlpha2languages()
        {
                return $this->alpha2languages;
        }



        /**
         * Get the value of isEnglish
         */
        public function getIsEnglish()
        {
                return $this->isEnglish;
        }
}
