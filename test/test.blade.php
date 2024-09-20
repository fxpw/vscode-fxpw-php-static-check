<?php
//checked вфывыф
use App\Models\MemberLike;
if (empty($item)) {
    return;
}
?>


{{-- <div class="col-6 col-md-4"> --}}
<div class="col overflow-hidden">
	<div class="service-card" data-card-id="<?= $item->id ?>" data-card-type="service">
		<a href="/services/{{ $item->id }}">
			<div class="service-card-top">
				<div class="service-card-image-part">
					<?php if( $item->hasImage() ) { ?>
					<img class="lazyload" src="<?= tUrl::img("placeholder_for_lazyload.svg") ?>" data-src="<?= $item->thumb("460-345") ?>"
					alt="">
					<?php } else { ?>
					<img class="lazyload" src="<?= tUrl::img("placeholder_for_lazyload.svg") ?>" data-src="<?= $item->getImageUrl() ?>"
					alt="">
					<?php } ?>
					<div>
						<div class="education-list-card-feedback-count">
							<svg width="15" height="15" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M1.75 2.91667V9.23417C1.75 9.87583 2.275 10.4008 2.91667 10.4008H4.1825C4.49167 10.4008 4.78917 10.5233 5.005 10.745L6.17167 11.9117C6.62667 12.3667 7.3675 12.3667 7.8225 11.9117L8.98917 10.745C9.21083 10.5233 9.5025 10.4008 9.81167 10.4008H11.0833C11.725 10.4008 12.25 9.87583 12.25 9.23417V2.91667C12.25 2.275 11.725 1.75 11.0833 1.75H2.91667C2.275 1.75 1.75 2.275 1.75 2.91667Z"
									fill="#959595" />
							</svg>
							<span><?= $item->feedbacks->count() ?></span>
						</div>
						<div class="education-list-card-rate-count">
							<svg width="15" height="15" style="margin-top: -1px;" viewBox="0 0 12 12" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M7.0213 1.58359L7.76213 3.08276C7.92547 3.42109 8.25213 3.65443 8.61963 3.70693L10.2705 3.94609C11.2038 4.08026 11.5771 5.22943 10.9005 5.89443L9.70463 7.06109C9.4363 7.32359 9.3138 7.70276 9.37797 8.07026L9.65797 9.71526C9.81547 10.6486 8.8413 11.3603 8.0013 10.9169L6.52547 10.1411C6.19297 9.96609 5.7963 9.96609 5.4638 10.1411L3.98797 10.9169C3.1538 11.3544 2.1738 10.6486 2.3313 9.71526L2.6113 8.07026C2.67547 7.70276 2.55297 7.32359 2.28463 7.06109L1.0888 5.89443C0.412134 5.23526 0.785467 4.08609 1.7188 3.94609L3.36963 3.70693C3.7488 3.65443 4.07547 3.42109 4.2388 3.08276L4.97963 1.58359C5.3938 0.73776 6.60713 0.73776 7.0213 1.58359Z"
									fill="#F9AF2C" />
							</svg>
							<span><?= $item->getAverageRating("education")?> выфафывфывыафып</span>
						</div>
					</div>
				</div>
			</div>
			<div class="service-card-prices" data-mh="service-card__prices">
				<span class="font-lg font-w-700 red-text spacing">
					<?= $item->display("price") ?>
				</span>
				<?php if ($item->old_price) { ?>
				<span class="font-sm font-w-700 gray-text spacing" style="text-decoration: line-through">
					<?= $item->display("old_price") ?>
				</span>
				<?php } ?>
				<?php if ($sale_percent_f = $item->display('sale_percent')) { ?>
				<span class="font-sm font-w-700 red-text spacing">
					<?= $sale_percent_f ?>
				</span>
				<?php } ?>
			</div>

			<div class="service-card-space" data-mh="service-card__space">
				<div class="service-card-space-title">
					<?php if ($space = $item->space) { ?>
					<a href="{{ route("space.show.space", $item->space_id) }}">
						<span> <img src="<?= $space->thumb(32) ?>"> </span>

						<?= $space->display("title") ?>
					</a>
					<?php } ?>
				</div>

				<?php if ($space = $item->space) { ?>

				<?= $space->display("title") ?>
				<?php } ?>


			</div>
			<div class="service-card-title">
				<?= $item->display("title") ?>
			</div>
			<a class="w-100 mt-2 price_card_btn_at_home_cart" href="<?= tRoute::get("profile.services.fastBuy", $item->id) ?>">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M19 8H5C3.9 8 3 8.9 3 10V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V10C21 8.9 20.1 8 19 8Z"
						stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M8 11V7C8 4.79 9.79 3 12 3C14.21 3 16 4.79 16 7V11" stroke="#fff" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" />
				</svg>
				<span style="font-size:12px; ">{{ __("services/content.buy") }}</span>
			</a>
		</a>

	</div>
</div>
