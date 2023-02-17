import { readonly } from 'vue'
import AccountModule from './account'
import GlobalModule from './global'

export default readonly({
  Account: AccountModule,
  Global: GlobalModule
})
