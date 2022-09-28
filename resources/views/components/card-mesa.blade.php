<div class="card mb-3" style="max-width: 240px;">
    <div class="row g-0">
        <div class="col-md-4" style="border-right: 1px solid #ddd; display: flex;">
            <div style="margin: auto; font-weight: bold; font-size: 20px;">
                @if (isset($number))
                    {{ $number }}
                @endif
            </div>
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <p class="card-title">Card title</p>
        </div>
        </div>
    </div>
</div>