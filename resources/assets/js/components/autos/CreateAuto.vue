<template>
    <div>

        <div class="modal fade bs-example-modal-lg" id="createAutoModal" tabindex="-1" role="dialog" aria-labelledby="createAutoModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="createAutoModalLabel">Добавить автомобиль</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 clearfix">
                                <img class="avatar" :src="'public/images/autos/' + singleAuto.image" @click="fileInputClick"/>

                                <!--<div title="изображение" class="avatar"-->
                                     <!--:style="'background:url(\'' + singleAuto.image + '\')'" @click="fileInputClick">-->
                                    <!--<transition name="slide-opacity"><i class="fa fa-pencil"></i></transition>-->
                                <!--</div>-->
                                <!--<a v-if="avatar != '/public/images/' + gender + '.png'" href="#" class="delete-avatar-button" @click.prevent="deleteAvatar">Удалить изображение</a>-->
                                <input type="file" name="file" class="form-input avatar-input" id="avatar" @change="uploadFile"/>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Марка:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="Наименование" v-model="singleAuto.brand" placeholder="Марка"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Vin:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="vin" v-model="singleAuto.vin" placeholder="vin"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Регистрационный номер:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="reg_number" v-model="singleAuto.reg_number" placeholder="Рег.номер"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Год выпуска:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="year" v-model="singleAuto.year" placeholder="Год"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">Объем:</label></div>
                            <div class="col-sm-8 clearfix">
                                <input type="text" name="year" v-model="singleAuto.volume" placeholder="Объем"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 clearfix"><label class="input-title">КП</label></div>
                            <div class="col-sm-8 clearfix"><select name="type" v-model="singleAuto.transmission" class="form-control">
                                <option value="автоматическая">автоматическая</option>
                                <option value="механическая">механическая</option>
                            </select>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="create">Создать</button>
                        <button type="button" class="btn btn-warning" @click="closeModal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                validation: ''
            }
        },

        computed: {
            autos: {
                get() { return this.$store.state.auto.autos},
                set(value) { return this.$stoavatarre.state.auto.autos = value }
            },
            singleAuto: {
                get() { return this.$store.state.auto.singleAuto },
                set(value) { return this.$store.state.auto.singleAuto = value }
            }
        },

        methods: {
            create() {
                axios.post('/auto/create', {
                    singleAuto: this.singleAuto
                }).then(response => {
                    this.$store.dispatch('getAllAutos');
                    $('#createAutoModal').modal('hide');
                }).catch(function (error) {});
            },

            closeModal() {
                $('#createAutoModal').modal('hide');
            },

            uploadFile() {
                // uploadFile
                let url = '/auto/upload';
                const config = { headers: { 'content-type': 'multipart/form-data' } };

                let data = new FormData();
                data.append('file', document.getElementById('avatar').files[0]);

                this.validation= { status:	"", error: "" };

                axios.post(url, data, config).then((response) => {
                    this.singleAuto.image = response.data.fileName;
                });
            },

            fileInputClick() {
                $('#avatar').click();
            }
        }


    }
</script>
