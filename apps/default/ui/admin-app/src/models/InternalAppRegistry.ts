export class InternalAppRegistry {
  private static appList = [
    {
      title: 'phpinfo()',
      url: '/phpinfo',
      spaApp: true
    },
    {
      title: 'Test E-mail',
      url: '/test-email',
      spaApp: true
    }
  ]
  static getAppList() {
    return this.appList
  }
}
