<?php

use App\Models\Categories;
use Carbon\Carbon;
use App\Models\Comity;
use App\Models\Media;

if (! function_exists('d')) {
    function d($data)
    {
        echo "<pre>";
        print_r($data);die;
    }
}


if (! function_exists('getVisibility')) {
    function getVisibility($val) {
        $value = null;
        if($val==1){
            $value = '<span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Show<i class="bi bi-check2 ms-2"></i></span>';

        }else{
            $value = '<span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Hide<i class="bi bi-x-lg ms-2"></i></span>';
        }
        return $value;

    }
}


if (! function_exists('getStatus')) {
    function getStatus($val) {
        $value = null;
        if($val==1){
            $value = '<span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span>';

        }else{
            $value = '<span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Inactive<i class="bi bi-x-lg ms-2"></i></span>';
        }
        return $value;

    }
}


if (! function_exists('checkUncheck')) {
    function checkUncheck($val,$val2) {
        $value = null;
        if($val==$val2){
            $value = 'checked';
        }else{
            $value = '';
        }
        return $value;
    }
}












if (!function_exists('getFileExtension')) {
    function getFileExtension($filePath) {
        $extensions = ['.jpeg', '.png', '.jpg', '.gif', '.svg', '.webp', '.pdf'];
        foreach ($extensions as $extension) {
            if (str_ends_with($filePath, $extension)) {
                return $extension;
            }
        }
        return null;
    }
}




if (!function_exists('numberToWords')) {
 
    function numberToWords($num)
    {
        $ones = [
            0 => 'Zero', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four', 5 => 'Five',
            6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine', 10 => 'Ten',
            11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen', 19 => 'Nineteen'
        ];

        $tens = [
            0 => '', 1 => 'Ten', 2 => 'Twenty', 3 => 'Thirty', 4 => 'Forty',
            5 => 'Fifty', 6 => 'Sixty', 7 => 'Seventy', 8 => 'Eighty', 9 => 'Ninety'
        ];

        $hundreds = [
            'Hundred', 'Thousand', 'Million', 'Billion', 'Trillion', 'Quadrillion'
        ];

        // Format the number with two decimal points
        $num = number_format($num, 2, '.', '');
        $num_parts = explode('.', $num);

        $integer = $num_parts[0];  // Integer part of the number
        $decimal = $num_parts[1];  // Decimal part

        $num_in_words = '';

        // Convert integer part to words
        if ($integer == 0) {
            $num_in_words .= 'Zero';
        } else {
            $counter = 0;
            while ($integer > 0) {
                $hundreds_place = $integer % 1000;
                $integer = (int) ($integer / 1000);

                if ($hundreds_place > 0) {
                    $num_in_words = convertThreeDigitNumber($hundreds_place, $ones, $tens) . ' ' . ($counter > 0 ? $hundreds[$counter] : '') . ' ' . $num_in_words;
                }

                $counter++;
            }
        }

        // Add the decimal part if it's greater than 0, otherwise skip the "and"
        if ((int) $decimal > 0) {
            return trim($num_in_words) . ' and ' . numberToWords((int)$decimal) . ' Cents';
        } else {
            return trim($num_in_words);
        }
    }

}

if (!function_exists('convertThreeDigitNumber')){
    function convertThreeDigitNumber($num, $ones, $tens)
    {
        $hundreds_place = (int) ($num / 100);
        $remainder = $num % 100;

        $in_words = '';

        if ($hundreds_place > 0) {
            $in_words .= $ones[$hundreds_place] . ' Hundred ';
        }

        if ($remainder > 0) {
            if ($remainder < 20) {
                $in_words .= $ones[$remainder];
            } else {
                $in_words .= $tens[(int) ($remainder / 10)];
                if ($remainder % 10 > 0) {
                    $in_words .= '-' . $ones[$remainder % 10];
                }
            }
        }

        return trim($in_words);
    }
}


if (!function_exists('getParentCategory')) {
    function getParentCategory($id) {
        $parentCat = Categories::find($id);

        if ($parentCat) {
            
            return '<a class="fw-semibold line-clamp-3 mb-0" href="' . url('category/' . $parentCat->id . '/edit') . '">' . htmlspecialchars($parentCat->name) . '</a>';
        } else {
            
            return '<span class="badge badge-phoenix badge-phoenix-primary">
                        <span class="ms-1" data-feather="check" style="height:12.8px;width:12.8px;"></span>
                        <span class="badge-label">Parent</span>
                    </span>';
        }
    }
}

if (!function_exists('getAllCommitee')) {
    function getAllCommitee() {
        $commitees = Comity::where('status',1)->get();

        return $commitees ;
     }
}
if (!function_exists('getCommitee')) {
    function getCommitee($id) {
        $commitees = Comity::find($id);

        return $commitees ;
     }
}
if (!function_exists('handleFileUpload')) {
    function handleFileUpload($file)
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";

        $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs($directoryPath, $fileName, 'public');

        $media = Media::create([
            'file_type' => 'image',
            'file_name' => $fileName,
            'file_path' => $filePath,
            'status' => 1,
        ]);

        return $media->id; // Return media ID
    }
}

if (!function_exists('generate_member_id')) {
    function generate_member_id($id) {
        if ($id > 9999) {
            return 'M' . $id;
        }
        return 'M' . str_pad($id, 4, '0', STR_PAD_LEFT);
    }
}

if (!function_exists('format_datetime')) {
    function format_datetime($datetime)
    {
        // Parse the datetime string into a Carbon instance
        $carbonDatetime = \Illuminate\Support\Carbon::parse($datetime);
        
        // Format the datetime using the desired format
        return $carbonDatetime->format('F d, Y h:i A');
    }
}

if (!function_exists('format_date')) {
    function format_date($date)
    {
        $carbonDate = \Illuminate\Support\Carbon::parse($date);
        return $carbonDate->format('d/m/Y');
    }
}

if (!function_exists('format_date_for_db')) {
    function format_date_for_db($datetime)
    {
        // Parse the datetime string into a Carbon instance
        $carbonDatetime = \Illuminate\Support\Carbon::parse($datetime);
        
        // Format the datetime using the desired format
        return $carbonDatetime->format('Y-m-d');
    }
}

if (!function_exists('format_date_to_month')) {
    function format_date_to_month($date)
    {
        $carbonDate = \Illuminate\Support\Carbon::parse($date);
        return $carbonDate->format('F, Y');
    }
}

if (!function_exists('is_even')){
    function is_even($num){
        if (($num ^ 1) == ($num + 1)){
            return true;
        }else{
            return false;
        }
    }
}

if (!function_exists('format_label')) {
    function format_label($string)
    {
        $formattedString = str_replace('_', ' ', $string);
        return ucwords($formattedString);
    }
}