<div>
    <div class="card rounded-none bg-neutral border shadow-2xl m-auto my-10 text-neutral-content w-96">
        <div class="card-body items-center text-center">
            <h2 class="card-title text-red-400 font-medium text-xl">Payment Failure!</h2>
            <div class="avatar py-6">
                <x-mary-icon name="o-x-circle" class="w-20 h-20 border-red-500 text-red-500 p-2 rounded-full" />
            </div>
            <div class="p-4 text-gray-400">
                We're sorry, but your payment couldn't be completed. Please check your card details or contact your bank
                for assistance.
            </div>
            <div class="card-actions justify-end">
                <button href="{{route('home')}}" class=" btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>