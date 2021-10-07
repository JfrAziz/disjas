<x-app-layout>
    <x-card title="Chart">
        @slot('aside')
            <x-button.black onclick="Livewire.emit('openModal', 'example')">
                <div class="mr-2">
                    <i class="gg-math-plus" style="--ggs: 0.6;"></i>
                </div>
                <span>data</span>
            </x-button.black>
        @endslot
        <div>
            <div><span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore dolorem accusantium, cumque iure facere, magni maxime quis quisquam mollitia a sed explicabo blanditiis eius, odio neque nobis rerum? Asperiores, nihil.</span></div>
            <div><span>Cum, quibusdam nemo fuga, laborum sequi ad maxime sed blanditiis, quis et quas qui iste aliquid dicta temporibus eaque sunt molestiae assumenda perspiciatis consequuntur expedita nostrum magni vel explicabo. Aspernatur.</span></div>
            <div><span>Fugiat facere ducimus amet commodi cum dolorum provident, rem voluptates quae magni, est, quisquam nostrum sapiente. Illo obcaecati magni quaerat, nobis repellat omnis rerum voluptatum dignissimos perspiciatis eius. Vel, nulla.</span></div>
            <div><span>Necessitatibus earum nisi perspiciatis nemo magnam ratione corrupti omnis praesentium fuga odio eius esse, illum consequuntur est debitis aspernatur distinctio cupiditate voluptas qui! Deserunt, cum voluptatem? Magnam maxime eius quos.</span></div>
            <div><span>Nam saepe expedita, repudiandae enim modi adipisci odio placeat veritatis vitae fugit natus aspernatur debitis consequatur nihil perspiciatis illo hic rerum illum totam recusandae, voluptatem assumenda. Et velit quis quo.</span></div>
        </div>
    </x-card>
</x-app-layout>
