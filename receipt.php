<?php

declare(strict_types=1);

// Function is called from roomCheck.php if booking is successful.
// Function prints booking info in JSON format.
//Magnus V. - Added the array with selected extra features, to be added to the receipt.
function receipt($arrDate, $depDate, $totalCost, $selectedExtraFeatures)
{

    $cleanFeaturesList = [];

    foreach ($selectedExtraFeatures as $selectedExtraFeature) {
        if ($selectedExtraFeature['feature'] != "") {
            foreach ($selectedExtraFeatures as $selectedExtraFeature) {
                if ($selectedExtraFeature['feature'] != "") {
                    $cleanFeaturesList[] = $selectedExtraFeature;
                }
            }
            break;
        }
    }

    if ($cleanFeaturesList == null || empty($cleanFeaturesList)) :
        $featuresReceipt = "No extras selected.";
    else : $featuresReceipt = $cleanFeaturesList;
    endif;

    $receiptContent = [
        "island" => "Isla de los Monos",
        "hotel" => "Overwater Resort",
        "arrival_date" => $arrDate,
        "departure_date" => $depDate,
        "total_cost" => $totalCost,
        "stars" => "3",
        "features" => $featuresReceipt,
        "additional_info" => "Thank you for choosing Overwater Resort."
    ];

    $receiptContent = json_encode($receiptContent, JSON_PRETTY_PRINT);

?>
    <div class="receipt">
        <p>Congratulations, the room is now booked. Be sure to save your receipt:</p>
        <pre><?= $receiptContent; ?></pre>
        <button>Okay</button>
    </div>
<?php
}
