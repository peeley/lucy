//code borrowed from: https://www.youtube.com/watch?v=A95mIE2HdcY

export class ClickAndHold
{   /**
 * 
 * @param {EventTarget} target //html element to apply event to
 * @param {Function} callback //function that runs when target is clicked and held
 */
    constructor(target, callback) 
    {
        this.target = target;
        this.callback = callback;
        this.isHeld = false; 
        this.activeHoldTimeoutID = null; //allows us to differentiate between different hold events

        //listening for all these events allows us to call onHoldStart and onHoldEnd
        ["mousedown", "touchstart"].forEach(type => {
                this.target.addEventListener(type, this._onHoldStart.bind(this));  
        });

        ["mouseup", "mouseleave", "mouseout", "touchend", "touchcancel"].forEach(type => {
            this.target.addEventListener(type, this._onHoldEnd.bind(this));  
        });
    }

    _onHoldStart()
    {
        this.isHeld = true;

        this.activeHoldTimeoutID = setTimeout(() => {
            if (this.isHeld)
            {
                this.callback();
            }
        }, 1000);
    }

    _onHoldEnd()
    {
        this.isHeld = false;
        clearTimeout(this.activeHoldTimeoutID);
    }
}

const tileButtons = document.getElementById("tileButton")

