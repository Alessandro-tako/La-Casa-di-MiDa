<x-layout>
    <div class="container py-5">
        <h1 class="text-gold mb-4">{{ __('ui.terms_conditions') }}</h1>

        <h5 class="text-gold">{{ __('ui.general_conditions') }}</h5>
        <ul class="text-muted">
            @foreach(__('ui.general_conditions_list') as $condition)
                <li>{!! $condition !!}</li>
            @endforeach
        </ul>

        <hr class="my-5">

        <h5 class="text-gold">{{ __('ui.pricing_policy') }}</h5>
        <p class="text-muted">{{ __('ui.pricing_policy_text') }}</p>

        <h6 class="text-gold mt-4">{{ __('ui.seasons') }}</h6>
        <ul class="text-muted">
            @foreach(__('ui.seasons_list') as $season)
                <li>{!! $season !!}</li>
            @endforeach
        </ul>

        <h6 class="text-gold mt-4">{{ __('ui.base_prices') }}</h6>
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('ui.room') }}</th>
                        <th>{{ __('ui.low') }}</th>
                        <th>{{ __('ui.mid') }}</th>
                        <th>{{ __('ui.high') }}</th>
                    </tr>
                </thead>
                <tbody class="text-muted">
                    <tr>
                        <td>{{ __('ui.green_room') }}</td>
                        <td>€125</td>
                        <td>€160</td>
                        <td>€185</td>
                    </tr>
                    <tr>
                        <td>{{ __('ui.gray_room') }}</td>
                        <td>€125</td>
                        <td>€160</td>
                        <td>€185</td>
                    </tr>
                    <tr>
                        <td>{{ __('ui.pink_room') }}</td>
                        <td>€115</td>
                        <td>€150</td>
                        <td>€175</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h6 class="text-gold mt-4">{{ __('ui.discounts_supplements') }}</h6>
        <ul class="text-muted">
            @foreach(__('ui.discounts_list') as $discount)
                <li>{!! $discount !!}</li>
            @endforeach
        </ul>
    </div>
</x-layout>
