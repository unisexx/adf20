<?php
if (!function_exists('get_first_paragraph')) {
    function get_first_paragraph($text)
    {
        $p = substr($text, strpos($text, "<p"), strpos($text, "</p>") + 4);
        return $p;
    }
}

if (!function_exists('icon_bar')) {
    function icon_bar($socialInfo)
    {
        $txt = '';

        foreach ($socialInfo as $item) {
            if (@$item->provider == 'line' && @$item->status == 1) {
                $txt .= '<a rel="nofollow" href="http://line.me/ti/p/~' . @$item->link . '" target="_blank" class="whatsapp-ic mr-3" role="button"><i class="fab fa-lg fa-line"></i></a>';
            }

            if (@$item->provider == 'facebook' && @$item->status == 1) {
                $txt .= '<a rel="nofollow" href="https://www.facebook.com/' . @$item->link . '" target="_blank" class="fb-ic mr-3" role="button"><i class="fab fa-lg fa-facebook-f"></i></a>';
            }

            if (@$item->provider == 'instagram' && @$item->status == 1) {
                $txt .= '<a rel="nofollow" href="https://www.instagram.com/' . @$item->link . '" target="_blank" class="ins-ic mr-3" role="button"><i class="fab fa-lg fa-instagram pink-text"></i></a>';
            }

            if (@$item->provider == 'twitter' && @$item->status == 1) {
                $txt .= '<a rel="nofollow" href="' . @$item->link . '" target="_blank" class="tw-ic mr-3" role="button"><i class="fab fa-lg fa-twitter"></i></a>';
            }

            if (@$item->provider == 'youtube' && @$item->status == 1) {
                $txt .= '<a rel="nofollow" href="https://www.youtube.com/channel/' . @$item->link . '" target="_blank" class="yt-ic mr-3" role="button"><i class="fab fa-lg fa-youtube"></i></a>';
            }

            if (@$item->provider == 'tiktok' && @$item->status == 1) {
                $txt .= '<a rel="nofollow" href="' . @$item->link . '" target="_blank" class="" role="button">
                    <svg viewBox="119.51 70.49 561.02 675.3000000000001" xmlns="http://www.w3.org/2000/svg" width="22" height="22" style="margin-left:-7px;"><g fill="#ee1d52"><path d="M196 498.32l1.64 4.63c-.21-.53-.81-2.15-1.64-4.63zM260.9 393.39c2.88-24.88 12.66-38.81 31.09-53.09 26.37-19.34 59.31-8.4 59.31-8.4V267a135.84 135.84 0 0 1 23.94 1.48V352s-32.93-10.94-59.3 8.41c-18.42 14.27-28.22 28.21-31.09 53.09-.09 13.51 2.34 31.17 13.53 46.44q-4.15-2.22-8.46-5.06c-24.65-17.27-29.14-43.18-29.02-61.49zM511.25 147c-18.14-20.74-25-41.68-27.48-56.39h22.82s-4.55 38.57 28.61 76.5l.46.51A132.76 132.76 0 0 1 511.25 147zM621.18 205.8v81.84s-29.12-1.19-50.67-6.91c-30.09-8-49.43-20.27-49.43-20.27s-13.36-8.75-14.44-9.36v169c0 9.41-2.47 32.91-10 52.51-9.83 25.64-25 42.47-27.79 45.91 0 0-18.45 22.75-51 38.07-29.34 13.82-55.1 13.47-62.8 13.82 0 0-44.53 1.84-84.6-25.33a169.63 169.63 0 0 1-24.16-20.26l.2.15c40.08 27.17 84.6 25.33 84.6 25.33 7.71-.35 33.47 0 62.8-13.82 32.52-15.32 51-38.07 51-38.07 2.76-3.44 18-20.27 27.79-45.92 7.51-19.59 10-43.1 10-52.51V231c1.08.62 14.43 9.37 14.43 9.37s19.35 12.28 49.44 20.27c21.56 5.72 50.67 6.91 50.67 6.91v-64.13c9.96 2.33 18.45 2.96 23.96 2.38z"/></g><path d="M597.23 203.42v64.11s-29.11-1.19-50.67-6.91c-30.09-8-49.44-20.27-49.44-20.27s-13.35-8.75-14.43-9.37V400c0 9.41-2.47 32.92-10 52.51-9.83 25.65-25 42.48-27.79 45.92 0 0-18.46 22.75-51 38.07-29.33 13.82-55.09 13.47-62.8 13.82 0 0-44.52 1.84-84.6-25.33l-.2-.15a157.5 157.5 0 0 1-11.93-13.52c-12.79-16.27-20.63-35.51-22.6-41a.24.24 0 0 1 0-.07c-3.17-9.54-9.83-32.45-8.92-54.64 1.61-39.15 14.81-63.18 18.3-69.2A162.84 162.84 0 0 1 256.68 303a148.37 148.37 0 0 1 42.22-25 141.61 141.61 0 0 1 52.4-11v64.9s-32.94-10.9-59.3 8.4c-18.43 14.28-28.21 28.21-31.09 53.09-.12 18.31 4.37 44.22 29 61.5q4.31 2.85 8.46 5.06a65.85 65.85 0 0 0 15.5 15.05c24.06 15.89 44.22 17 70 6.68C401.06 474.78 414 459.23 420 442c3.77-10.76 3.72-21.59 3.72-32.79V90.61h60c2.48 14.71 9.34 35.65 27.48 56.39a132.76 132.76 0 0 0 24.41 20.62c2.64 2.85 16.14 16.94 33.47 25.59a130.62 130.62 0 0 0 28.15 10.21z"/><path d="M187.89 450.39v.05l1.48 4.21c-.17-.49-.72-1.98-1.48-4.26z" fill="#69c9d0"/><path d="M298.9 278a148.37 148.37 0 0 0-42.22 25 162.84 162.84 0 0 0-35.52 43.5c-3.49 6-16.69 30.05-18.3 69.2-.91 22.19 5.75 45.1 8.92 54.64a.24.24 0 0 0 0 .07c2 5.44 9.81 24.68 22.6 41a157.5 157.5 0 0 0 11.93 13.52 166.64 166.64 0 0 1-35.88-33.64c-12.68-16.13-20.5-35.17-22.54-40.79a1 1 0 0 1 0-.12v-.07c-3.18-9.53-9.86-32.45-8.93-54.67 1.61-39.15 14.81-63.18 18.3-69.2a162.68 162.68 0 0 1 35.52-43.5 148.13 148.13 0 0 1 42.22-25 144.63 144.63 0 0 1 29.78-8.75 148 148 0 0 1 46.57-.69V267a141.61 141.61 0 0 0-52.45 11z" fill="#69c9d0"/><path d="M483.77 90.61h-60v318.61c0 11.2 0 22-3.72 32.79-6.06 17.22-18.95 32.77-36.13 39.67-25.79 10.36-45.95 9.21-70-6.68a65.85 65.85 0 0 1-15.54-15c20.49 10.93 38.83 10.74 61.55 1.62 17.17-6.9 30.08-22.45 36.12-39.68 3.78-10.76 3.73-21.59 3.73-32.78V70.49h82.85s-.93 7.92 1.14 20.12zM597.23 185.69v17.73a130.62 130.62 0 0 1-28.1-10.21c-17.33-8.65-30.83-22.74-33.47-25.59a93.69 93.69 0 0 0 9.52 5.48c21.07 10.52 41.82 13.66 52.05 12.59z" fill="#69c9d0"/><path d="M486.85 701.51a22.75 22.75 0 0 1-1-6.73v-.16a24.53 24.53 0 0 0 1 6.89zM536.44 694.62v.16a23.07 23.07 0 0 1-1 6.73 24.89 24.89 0 0 0 1-6.89z" fill="none"/><path d="M485.84 694.78a22.75 22.75 0 0 0 1 6.73 2.59 2.59 0 0 0 .14.45 25.28 25.28 0 0 0 24.16 17.8v25.59c-12.46 0-21.38.44-35-7.59-15.44-9.16-24.14-25.91-24.14-43.3 0-17.94 9.74-35.91 26.25-44.57 12-6.28 21.09-6.32 32.92-6.32v25.58a25.31 25.31 0 0 0-25.31 25.31z" fill="#69c9d0"/><path d="M536.64 694.78a23.07 23.07 0 0 1-1 6.73c0 .15-.09.3-.14.45a25.3 25.3 0 0 1-24.16 17.8v25.59c12.45 0 21.38.44 34.95-7.59 15.49-9.16 24.21-25.91 24.21-43.3 0-17.94-9.74-35.91-26.25-44.57-12-6.28-21.09-6.32-32.91-6.32v25.58a25.31 25.31 0 0 1 25.3 25.31z" fill="#ee1d52"/><path d="M119.51 620.36h93.71l-8.66 25.78H180v98.67h-30.13v-98.67h-30.36zm248.35 0v25.78h30.36v98.67h30.17v-98.67h24.52l8.66-25.78zm-134.25 29.38A14.6 14.6 0 1 0 219 635.15a14.59 14.59 0 0 0 14.61 14.59zM219 744.81h29.58v-84.75H219zM355 649h-34.6l-29.82 29.82v-58.36h-29.39l-.09 124.35h29.67v-32.4L300 704l28.8 40.77h31.72l-41.72-59.62zm283.77 36.17L674.94 649h-34.59l-29.83 29.82v-58.36h-29.38L581 744.81h29.68v-32.4L620 704l28.8 40.77h31.73zm-76.06 9.27c0 28.1-23.09 50.89-51.57 50.89s-51.57-22.79-51.57-50.89 23.09-50.89 51.57-50.89 51.57 22.8 51.57 50.91zm-26.27 0a25.3 25.3 0 1 0-25.3 25.3 25.3 25.3 0 0 0 25.3-25.28z"/></svg>
                </a>';
            }
        }
        return $txt;
    }
}

if (!function_exists('get_recipient_profile')) {
    function get_recipient_profile($chatroom)
    {
        if ($chatroom->from_user_id != Auth::user()->id) {
            $rs = $chatroom->fromProfile;
        } elseif ($chatroom->to_user_id != Auth::user()->id) {
            $rs = $chatroom->toProfile;
        }
        return $rs;
    }
}

if (!function_exists('sex_id_2_color_class')) {
    function sex_id_2_color_class($sex_id)
    {
        switch ($sex_id) {
            case "1": //ชาย
                $class = "blue";
                break;
            case "2": //หญิง
                $class = "pink";
                break;
            case "3": //ทอม
                $class = "orange";
                break;
            case "4": //ดี้
                $class = "pink darken-1";
                break;
            case "5": //ทอมเกย์
                $class = "orange darken-1";
                break;
            case "6": //ทอมเกย์คิง
                $class = "orange darken-2";
                break;
            case "7": //ทอมเกย์ควีน
                $class = "orange lighten-1";
                break;
            case "8": //ทอมเกย์ทูเวย์
                $class = "orange darken-4";
                break;
            case "9": //เกย์คิง
                $class = "purple darken-1";
                break;
            case "10": //เกย์ควีน
                $class = "purple lighten-1";
                break;
            case "11": //โบ๊ท
                $class = "purple";
                break;
            case "12": //ไบท์
                $class = "grey darken-2";
                break;
            case "13": //เลสเบี้ยน
                $class = "pink accent-2";
                break;
            case "14": //กระเทย
                $class = "pink accent-3";
                break;
            case "15": //อดัม
                $class = "blue darken-2";
                break;
            case "16": //แองจี้
                $class = "pink accent-4";
                break;
            case "17": //เชอร์รี่
                $class = "red accent-2";
                break;
            case "18": //สามย่าน
                $class = "red accent-4";
                break;
            case "19": //ผู้หญิงข้ามเพศ
                $class = "pink lighten-1";
                break;
            case "20": //ผู้ชายข้ามเพศ
                $class = "blue lighten-1";
                break;
            case "21": //ผู้ชายข้ามเพศ
                $class = "purple";
                break;
            default:
                $class = "grey darken-4";
        }

        return $class;
    }
}
