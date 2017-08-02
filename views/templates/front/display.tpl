<div id="qdtestimonials_block_home" class="block">
    <h1>{l s='Testimonials List!' mod='qdtestimonials'}</h1>
    <div class="block_content">
        {foreach from=$posts item=post}
            <h2><a href="#">{$post.qdtestimonials_author}</a></h2>
        {/foreach}
    </div>
</div>
