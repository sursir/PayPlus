export const API_ROOT = (process.env.NODE_ENV === 'production')
  ? 'http://pay.cxsir.com/api'
  : 'http://pay.dev'

export const AUTH_SIGNIN = API_ROOT + '/auth/signin'
