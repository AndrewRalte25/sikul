<x-app-layout>
    <div class="container">
        <form action="/admitpayment" method="POST">
            @csrf
            <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ config('services.razorpay.key') }}"
                data-amount="50000"
                data-currency="INR"
                data-order_id="123"
                data-buttontext="Pay with Razorpay"
                data-name="School Fee"
                data-description="Monthly School Fee Payment"
                data-prefill.name="asd"
                data-prefill.email="asd@asd.com"
                data-theme.color="#F37254"
            ></script>
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        </form>
    </div>
</x-app-layout>
