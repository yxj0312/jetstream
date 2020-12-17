<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ALPINE1
        </h2>
    </x-slot>
    
    <!-- <div x-data="{ cards: [{ color: 'green', flipped: false, cleared: false }] }" class="px-10 flex items-center justify-center min-h-screen"> -->
    <div x-data="game()" class="px-10 flex items-center justify-center min-h-screen">
        <h1 class="fixed top-0 right-0 p-10 font-bold text-3xl">
            <span x-text="points"></span>
            <span class="text-xs">pts</span>
        </h1>

        <div class="flex-1 grid grid-cols-4 gap-10">
            <template x-for="(card, index) in cards" :key="index">
                <div>
                    <button x-show="! card.cleared"
                            :style="'background: ' + (card.flipped ? card.color : '#999')"
                            :disabled="flippedCards.length >= 2"
                            class="w-full h-32"
                            @click="flipCard(card)"
                    >
                    </button>
                </div>
            </template>
        </div>
    </div>
</x-app-layout>

<script>
    function game() {
            return {
                cards: [
                    { color: 'green', flipped: false, cleared: false },
                    { color: 'red', flipped: false, cleared: false },
                    { color: 'blue', flipped: false, cleared: false },
                    { color: 'yellow', flipped: false, cleared: false },
                    { color: 'green', flipped: false, cleared: false },
                    { color: 'red', flipped: false, cleared: false },
                    { color: 'blue', flipped: false, cleared: false },
                    { color: 'yellow', flipped: false, cleared: false },
                ].sort(() => Math.random() - .5),

                get flippedCards() {
                    return this.cards.filter(card => card.flipped);
                },

                get clearedCards() {
                    return this.cards.filter(card => card.cleared);
                },

                get remainingCards() {
                    return this.cards.filter(card => ! card.cleared);
                },

                get points() {
                    return this.clearedCards.length;
                },

                async flipCard(card) {
                    card.flipped = ! card.flipped;

                    if (this.flippedCards.length !== 2) return;

                    if (this.hasMatch()) {
                        flash('You found a match!');

                        await pause();

                        this.flippedCards.forEach(card => card.cleared = true);

                        if (! this.remainingCards.length) {
                            alert('You Won!');
                        }
                    } else {
                        await pause();
                    }

                    this.flippedCards.forEach(card => card.flipped = false);
                },

                hasMatch() {
                    return this.flippedCards[0]['color'] === this.flippedCards[1]['color'];
                }
            };
        }
    </script>
</script>