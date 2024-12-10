<div class="shadow border rounded-lg bg-white overflow-hidden max-w-5xl mx-auto">
    @isset($slides)
        <x-mary-carousel :slides="$slides" class="rounded-none h-[300px]" />
    @endisset
    <div class="p-5">
        <x-mary-header title="About" separator />
        @isset($about_page)
            <div>{!! $about_page->content !!}</div>
        @endisset
    </div>
</div>
