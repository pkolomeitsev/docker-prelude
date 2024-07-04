export class AppDTO {
  private _title: string
  private _link: string
  private _spaApp: boolean

  constructor(title: string, link: string, spaApp?: boolean) {
    this._title = title
    this._link = link
    this._spaApp = spaApp || false
  }

  public get title(): string {
    return this._title
  }
  public set title(value: string) {
    this._title = value
  }
  public get link(): string {
    return this._link
  }
  public set link(value: string) {
    this._link = value
  }
  public get spaApp(): boolean {
    return this._spaApp
  }
  public set spaApp(value: boolean) {
    this._spaApp = value
  }
}
