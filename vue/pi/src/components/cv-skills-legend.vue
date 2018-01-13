<template>

        <div>
            <li class="list-group-item">
                <label class="col-xs-6 text-right">Junior</label>
                <span class="rating">
                            <span></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star active"></span>
                        </span>
            </li>
            <li class="list-group-item">
                <label class="col-xs-6 text-right">SemiSr</label>
                <span class="rating">
                            <span></span>
                            <span class="star"></span>
                            <span class="star active"></span>
                            <span class="star "></span>
                        </span>
            </li>
            <li class="list-group-item">
                <label class="col-xs-6 text-right">Senior</label>
                <span class="rating">
                            <span></span>
                            <span class="star active"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </span>
            </li>
        </div>

</template>

<script>

  export default {
    name: 'cv-skills-legend'
  }
</script>
