import { LocalStorageHelper } from './LocalStorageHelper'

export class OldUISwitcher {
  static key = 'oldUI'
  static url = 'http://localhost/old'

  static switchToOld() {
    LocalStorageHelper.setItem(this.key, true)
    this.redirectToOldUI()
  }
  static isOldUI() {
    return LocalStorageHelper.getItem(this.key)
  }
  static redirectToOldUI() {
    window.location.href = this.url
  }
}
