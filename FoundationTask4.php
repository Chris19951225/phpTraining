<?php
    class ItemOwners {
        public static function groupByOwners($items) {

            if($items != null) {
                $ownerArray = array();
                foreach ($items as $item => $owner) {
                    if (!isset($ownerArray[$owner])) {
                        $ownerArray[$owner] = array();
                    }
                    array_push($ownerArray[$owner], $item);
                }

                return $ownerArray;
            }

            return null;
        }
    }

    $items = array(
        "Baseball Bat" => "John",
        "Golf ball" => "Stan",
        "Tennis Racket" => "John"
    );
    echo json_encode(ItemOwners::groupByOwners($items));
