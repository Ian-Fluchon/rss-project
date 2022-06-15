<?php

namespace App\Message;

final class GetActualityLinkMessage
{

    public function __construct(
        private string $url,
        private string $link,
        private string $links,
        private string $rssLink,
        private string $rssLoad,

    ) {
    }

        /**
         * Get the value of url
         */ 
        public function getUrl()
        {
                return $this->url;
        }

        /**
         * Get the value of link
         */ 
        public function getLink()
        {
                return $this->link;
        }

        /**
         * Get the value of links
         */ 
        public function getLinks()
        {
                return $this->links;
        }

        /**
         * Get the value of rss_link
         */ 
        public function getRssLink()
        {
                return $this->rssLink;
        }

        /**
         * Get the value of rss_load
         */ 
        public function getRssLoad()
        {
                return $this->rssLoad;
        }

}
