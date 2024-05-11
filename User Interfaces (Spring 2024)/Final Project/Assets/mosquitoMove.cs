using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class mosquitoMove : MonoBehaviour
{
    public LevelManager levelMan;
    public float moveSpeed = 3f;
    public float hoverForce = 1.5f;
    public float directionChangeInterval = 2f;
    private Rigidbody2D rb;
    private Vector2 movement;
    private float directionTimer = 0f;

    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
    }

    void Update()
    {
        directionTimer += Time.deltaTime;

        if (directionTimer >= directionChangeInterval)
        {
            directionTimer = 0f;
            ChangeDirection();
        }

        Hover();
    }

    void FixedUpdate()
    {
        rb.velocity = movement * moveSpeed;
    }

    private void ChangeDirection()
    {
        float angle = Random.Range(0, 360) * Mathf.Deg2Rad;
        movement = new Vector2(Mathf.Cos(angle), Mathf.Sin(angle));
        RotateInMovementDirection();
    }

    private void Hover()
    {
       
        if (Mathf.Abs(rb.velocity.y) < hoverForce)
        {
            rb.AddForce(new Vector2(0, hoverForce * Time.deltaTime), ForceMode2D.Impulse);
        }
    }

    private void RotateInMovementDirection()
    {
        if (movement != Vector2.zero)
        {
            float angle = Mathf.Atan2(movement.y, movement.x) * Mathf.Rad2Deg;
            angle += -90; 
            transform.rotation = Quaternion.Euler(0, 0, angle);
        }
    }

    private void OnMouseDown()
    {
        levelMan.FlyClicked();
        Destroy(gameObject);
    }
}
