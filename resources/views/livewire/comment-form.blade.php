<form wire:submit.prevent="submit">
    <div class="flex gap-2 mt-2">
        <input wire:model="comment"
            class="w-full px-4 py-1.5 text-primary rounded-xl border border-black bg-[#303134] focus:outline-none"
            placeholder="Tulis komentar..." required></input>
        <button type="submit"
            class="bg-tertiary text-white rounded-md px-4 py-1 hover:bg-primary hover:text-secondary transition">Kirim</button>
    </div>
</form>
