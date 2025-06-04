<x-layout>
    <div class="container py-5" role="main">
        <header class="mb-5">
            <h1 class="text-gold mb-4 h2">{{ __('ui.terms_conditions') }}</h1>
        </header>

        {{-- Condizioni generali --}}
        <section class="mb-5" aria-labelledby="general-conditions">
            <h2 id="general-conditions" class="h5 text-gold">{{ __('ui.general_conditions') }}</h2>
            <ul class="text-muted">
                @foreach (__('ui.general_conditions_list') as $condition)
                    <li>{!! $condition !!}</li>
                @endforeach
            </ul>
        </section>

        <hr class="my-5">

        {{-- Politica dei prezzi --}}
        <section class="mb-5" aria-labelledby="pricing-policy">
            <h2 id="pricing-policy" class="h5 text-gold">{{ __('ui.pricing_policy') }}</h2>
            <p class="text-muted">{{ __('ui.pricing_policy_text') }}</p>

            {{-- Stagionalità --}}
            <h3 class="h6 text-gold mt-4">{{ __('ui.seasons') }}</h3>
            <ul class="text-muted">
                @foreach (__('ui.seasons_list') as $season)
                    <li>{!! $season !!}</li>
                @endforeach
            </ul>

            {{-- Prezzi base --}}
            <h3 class="h6 text-gold mt-4">{{ __('ui.base_prices') }}</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">{{ __('ui.room') }}</th>
                            <th scope="col">{{ __('ui.low') }}</th>
                            <th scope="col">{{ __('ui.mid') }}</th>
                            <th scope="col">{{ __('ui.high') }}</th>
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
                            <td>{{ __('ui.grey_room') }}</td>
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
        </section>

        {{-- Sconti e supplementi --}}
        <section aria-labelledby="discounts">
            <h2 id="discounts" class="h5 text-gold mt-4">{{ __('ui.discounts_supplements') }}</h2>
            <ul class="text-muted">
                @foreach (__('ui.discounts_list') as $discount)
                    <li>{!! $discount !!}</li>
                @endforeach
            </ul>
        </section>
    </div>
</x-layout>
