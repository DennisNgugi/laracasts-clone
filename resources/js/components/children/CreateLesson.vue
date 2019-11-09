<template>
<div class="modal fade" id="createLesson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Lesson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" v-model="lesson.title" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="">Video</label>
                    <input type="text" v-model="lesson.video_id" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="">Episode number</label>
                    <input type="number" v-model="lesson.episode_number" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea v-model="lesson.description" class="form-control" rows="8" cols="30"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="updateLesson()" v-if="editing">Save lesson</button>

                <button type="button" class="btn btn-primary" @click="saveLesson()" v-else>Create lesson</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
class Lesson{
  constructor(lesson){
    this.title = lesson.title || ''
    this.description = lesson.description || ''
    this.video_id = lesson.video_id || ''
    this.episode_number = lesson.episode_number|| ''
  }
}
export default {

    data() {
        return {
            lesson:{},
            seriesId: '',
            editing: false,
            lessonId: null
        }
    },

    mounted() {
        this.$parent.$on('create_new_lesson', (seriesId) => {
          this.editing
          this.lesson = new Lesson({})
            this.seriesId = seriesId
            $('#createLesson').modal()
        })

        this.$parent.$on('edit_lesson', (lesson, seriesId) => {
            this.editing = true
            this.lesson = new Lesson(lesson)
                this.seriesId = seriesId,
                this.lessonId = lesson.id

            $('#createLesson').modal()
        })
    },

    methods: {
        saveLesson() {
            let url = `/admin/${this.seriesId}/lessons`
            axios.post(url,
              this.lesson
            ).
            then(resp => {
                this.$parent.$emit('lesson_created', resp.data)
                $('#createLesson').modal('hide')
            }).catch(error => {
                console.log(error)
            })
        },
        updateLesson() {
            axios.put(`/admin/${this.seriesId}/lessons/${this.lessonId}`,this.lesson)
                .then(resp => {
                    $('#createLesson').modal('hide')
                    this.$parent.$emit('lesson_updated',resp.data)
                }).catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>

<style lang="css" scoped>
</style>
