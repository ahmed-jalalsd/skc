<template>
    <section>
        <button class="button is-primary is-medium"
            @click="isComponentModalActive = true">
            Register
        </button>

        <b-modal :active.sync="isComponentModalActive" has-modal-card>
            <modal-form v-bind="formProps"></modal-form>
        </b-modal>
    </section>
</template>

<script>
    const ModalForm = {
        props: ['email', 'password'],
        template: `
            <form method="POST" action="{{ route('register') }}">
                <div class="modal-card" style="width: auto">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Login</p>
                    </header>
                    <section class="modal-card-body">

                        <b-field label="Name">
                            <b-input
                                type="text"
                                name="name"
                                :value="{{ old('name') }}"
                                autofocus
                                class="input"
                                id="name"
                                autofocus
                                required>
                            </b-input>

                            @if ($errors->has('name'))
                                <p class="help is-danger">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif

                        </b-field>

                        <b-field label="Email">
                            <b-input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                autofocus
                                placeholder="Your email"
                                required>
                            </b-input>

                            @if ($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif

                        </b-field>

                        <b-field label="Password">
                            <b-input
                                type="password"
                                :value="password"
                                class="input"
                                id="password"
                                name="password"
                                password-reveal
                                placeholder="Your password"
                                required>
                            </b-input>

                            @if ($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif

                        </b-field>

                        <b-field label="Confirm Password">
                            <b-input
                                type="password"
                                :value="password"
                                class="input"
                                id="password-confirm"
                                name="password_confirmation"
                                required>
                            </b-input>
                        </b-field>

                        <b-checkbox>Remember me</b-checkbox>
                    </section>
                    <footer class="modal-card-foot">
                        <button class="button" type="button" @click="$parent.close()">Close</button>
                        <button class="button is-primary">Login</button>
                    </footer>
                </div>
            </form>
        `
    }

    export default {
      components: {
          ModalForm
      },
        data() {
            return {
                isComponentModalActive: false,
                formProps: {
                    email: 'evan@you.com',
                    password: 'testing'
                }
            }
        }
    }
</script>
