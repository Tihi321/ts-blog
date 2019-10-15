
<script>
  import { onMount } from 'svelte';
  import { cubicInOut } from 'svelte/easing';
  import { fade, crossfade } from 'svelte/transition';
	import { flip } from 'svelte/animate';
  import Quote from './quote.svelte';
  import { getQuotes } from '../../../assets/scripts/services/quotes.js';

  export let number;
  export let interval;

  let quotes = [];
  let length;
  let index = 0;

  const [exit, enter] = crossfade({
		fallback(node, params) {
			return {
				duration: 1000,
				easing: cubicInOut,
				css: t => `opacity: ${t}`
			};
		}
	});

  function updateQuote() {
    index = (index >= length - 1) ? 0 : index + 1;
  }
  
  onMount(async () => {
    const response = await getQuotes(number);
    quotes = response.map((item, i) => {
      item.id = i;
      return item;
    });
    length = quotes.length;

		const changeQuotes = setInterval(() => {
      updateQuote();
		}, interval);

    return () => clearInterval(changeQuotes);
    
  });
</script>

{#each quotes.filter((item) => item.id === index) as quote (quote.id)}
  <div
    class="item"
    out:exit="{{key: quote.id}}"
    in:enter="{{key: quote.id}}"
    animate:flip
  >
    <Quote quote={quote} />
  </div>
{/each}
