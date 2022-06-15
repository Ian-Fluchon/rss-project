<?php

namespace App\Message;

final class PersisteUrlMessage
{
    public function __construct(
        private string $url,
        private string $language,
        private string $country,
    ){

    }
    

        /**
         * Get the value of url
         */ 
        public function getUrl()
        {
                return $this->url;
        }

        /**
         * Set the value of url
         *
         * @return  self
         */ 
        public function setUrl($url)
        {
                $this->url = $url;

                return $this;
        }

        /**
         * Get the value of language
         */ 
        public function getLanguage()
        {
                return $this->language;
        }

        /**
         * Set the value of language
         *
         * @return  self
         */ 
        public function setLanguage($language)
        {
                $this->language = $language;

                return $this;
        }

        /**
         * Get the value of country
         */ 
        public function getCountry()
        {
                return $this->country;
        }

        /**
         * Set the value of country
         *
         * @return  self
         */ 
        public function setCountry($country)
        {
                $this->country = $country;

                return $this;
        }
}
