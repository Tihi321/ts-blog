<script>
  export let quote;
</script>

<div class="quote">
  <div class="quote__text">{quote.quote_key}</div>
  {#if quote.author_key}
      <div class="quote__author">{quote.author_key}</div>
  {/if}
</div>