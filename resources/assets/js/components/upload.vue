<template>
    <b-field class="file">
        <b-upload v-model="files" name="featured_image">
            <a class="button is-primary backend-btn">
              <i class="fas fa-upload m-r-10"></i>

                <span>Click to upload</span>
            </a>
        </b-upload>
        <span class="file-name"
            v-if="files && files.length">
            {{ files[0].name }}
        </span>
    </b-field>
</template>

<script>
    export default {
        data() {
            return {
                files: []
            }
        }
    }
</script>
